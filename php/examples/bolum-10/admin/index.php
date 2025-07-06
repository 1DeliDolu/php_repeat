<?php
session_start();

// Username and password (example)
$correct_user = 'admin';
$correct_pass = '123456';

// If login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if ($user === $correct_user && $pass === $correct_pass) {
        // Set session and cookie
        $_SESSION['logged_in'] = true;
        setcookie('user', $user, time() + 3600, '/');

        header('Location: /php/courseapp/uygulama-12/index.php');
        exit;
    } else {
        $error = "Incorrect username or password!";
    }
}

// Logout process
if (isset($_GET['logout'])) {
    session_destroy();
    setcookie('user', '', time() - 3600, '/');
    header('Location: index.php');
    exit;
}

// Login check
$logged_in = $_SESSION['logged_in'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="w-100" style="max-width: 400px;">
        <?php if ($logged_in): ?>
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title mb-3">Welcome, <?php echo htmlspecialchars($_COOKIE['user'] ?? ''); ?>!</h2>
                    <a href="?logout=1" class="btn btn-danger">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">Login</h2>
                    <?php if (!empty($error)) echo "<div class='alert alert-danger text-center'>$error</div>"; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="user" class="form-label">Username</label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>