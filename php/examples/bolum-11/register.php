<?php
    $usernameErr = $emailErr = $passwordErr = $repasswordErr = $cityErr = $hobbiesErr = "";
    $username = $email = $password = $repassword = $city = "";
    $hobbies = [];
    $registerSuccess = "";

    // Example city and hobby arrays for demonstration
    $sehirler = [34 => 'Istanbul', 6 => 'Ankara', 35 => 'Izmir'];
    $hobiler = [1 => 'Cinema', 2 => 'Sports', 3 => 'Music', 4 => 'Books'];

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        if(empty($_POST["username"])) {
            $usernameErr = "Username is required.";
        } else {
            $username = htmlspecialchars($_POST["username"]);
        }

        if(empty($_POST["email"])) {
            $emailErr = "Email is required.";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }

        if(empty($_POST["password"])) {
            $passwordErr = "Password is required.";
        } else {
            $password = htmlspecialchars($_POST["password"]);
        }

        if($_POST["password"] != $_POST["repassword"]) {
            $repasswordErr = "Passwords do not match.";
        } else {
            $repassword = htmlspecialchars($_POST["repassword"]);
        }

        if($_POST["city"] == -1 ) {
            $cityErr = "You must select a city.";
        } else {
            $city = $_POST["city"];
        }

        if(!isset($_POST["hobbies"])) {
            $hobbiesErr = "You must select at least one hobby.";
        } else {
            $hobbies = $_POST["hobbies"];
        }

        if(!$usernameErr && !$emailErr && !$passwordErr && !$repasswordErr && !$cityErr && !$hobbiesErr) {
            // Save user to users.json only if email is not already registered
            $userFile = 'users.json';
            $users = file_exists($userFile) ? json_decode(file_get_contents($userFile), true) : [];
            if (!is_array($users)) $users = [];
            $emailExists = false;
            foreach ($users as $u) {
                if (isset($u['email']) && $u['email'] === $email) {
                    $emailExists = true;
                    break;
                }
            }
            if ($emailExists) {
                $emailErr = "This email is already registered.";
            } else {
                $users[] = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'city' => $city,
                    'hobbies' => $hobbies
                ];
                file_put_contents($userFile, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                $registerSuccess = "Registration successful!";
                // Clear all form fields after successful registration
                $username = $email = $password = $repassword = $city = "";
                $hobbies = [];
                header("Location: login.php");
                exit;
            }
        }
    }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="row w-100 justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#0d6efd" class="bi bi-person-plus mb-2" viewBox="0 0 16 16"></svg>
                          <path d="M8 7a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM2 13s-1 0-1-1 1-4 7-4 7 3 7 4-1 1-1 1H2zm11-6.5a.5.5 0 0 1 .5.5v1.5H15a.5.5 0 0 1 0 1h-1.5V11a.5.5 0 0 1-1 0V9.5H11a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <h3 class="mb-0">Register</h3>
                    </div>
                    <?php if ($registerSuccess) echo '<div class="alert alert-success text-center">'.$registerSuccess.'</div>'; ?>
                    <form action="register.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username;?>" required>
                            <div class="text-danger small"><?php echo $usernameErr; ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email;?>" required>
                            <div class="text-danger small"><?php echo $emailErr; ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password;?>" required>
                            <div class="text-danger small"><?php echo $passwordErr; ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Repeat Password</label>
                            <input type="password" name="repassword" class="form-control" required>
                            <div class="text-danger small"><?php echo $repasswordErr; ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select name="city" class="form-select" required>
                                <option value="-1" selected>Select a City</option>
                                <?php foreach($sehirler as $plaka => $sehir): ?>
                                    <option value="<?php echo $plaka; ?>" <?php echo $city == $plaka ? ' selected':'' ?>><?php echo $sehir; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="text-danger small"><?php echo $cityErr; ?></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hobbies</label>
                            <?php foreach($hobiler as $id => $hobi): ?>
                                <div class="form-check">
                                    <input type="checkbox" name="hobbies[]" value="<?php echo $id;?>" id="hobbies_<?php echo $id;?>" class="form-check-input" <?php if (in_array($id, $hobbies)) echo 'checked' ?>>
                                    <label for="hobbies_<?php echo $id;?>" class="form-check-label"><?php echo $hobi;?></label>
                                </div>
                            <?php endforeach; ?>
                            <div class="text-danger small"><?php echo $hobbiesErr; ?></div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
