<?php
    require "libs/variables.php";
    require "libs/functions.php";

    session_start();

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $userFile = 'users.json';
        $loginSuccess = false;
        if (file_exists($userFile)) {
            $users = json_decode(file_get_contents($userFile), true);
            if (is_array($users)) {
                foreach ($users as $user) {
                    if ($user['username'] === $username && $user['password'] === $password) {
                        $loginSuccess = true;
                        break;
                    }
                }
            }
        }
        if($loginSuccess) {
            $_SESSION["message"] = "Logged in with ".$username;
            $_SESSION['username'] = $username;
            header("Location: message.php");
            exit;
        } else {
            $loginError = "Wrong username or password";
        }
    }
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="row w-100 justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#0d6efd" class="bi bi-person-circle mb-2" viewBox="0 0 16 16">
                          <path d="M13.468 12.37C12.758 11.226 11.482 10.5 10 10.5c-1.482 0-2.758.726-3.468 1.87A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                          <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a7 7 0 1 0 0-14 7 7 0 0 0 0 14z"/>
                        </svg>
                        <h3 class="mb-0">Login</h3>
                    </div>
                    <?php if (!empty($loginError)) echo '<div class="alert alert-danger text-center">'.$loginError.'</div>'; ?>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "partials/_footer.php" ?>
