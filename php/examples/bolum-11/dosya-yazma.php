<?php
// Simple login and registration system with file message append
session_start();

$usersFile = "users.txt";
$messagesFile = "dosya2.txt";

function user_exists($username, $usersFile) {
    if (!file_exists($usersFile)) return false;
    $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($u, $p) = explode(":", $user);
        if ($u === $username) return true;
    }
    return false;
}

function check_login($username, $password, $usersFile) {
    if (!file_exists($usersFile)) return false;
    $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($u, $p) = explode(":", $user);
        if ($u === $username && $p === $password) return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $action = $_POST['action'] ?? '';
    
    if ($action === 'register') {
        if (user_exists($username, $usersFile)) {
            $info = "User already exists.";
        } else {
            file_put_contents($usersFile, "$username:$password\n", FILE_APPEND);
            $info = "Registration successful. You can now log in.";
        }
    } elseif ($action === 'login') {
        if (check_login($username, $password, $usersFile)) {
            $_SESSION['user'] = $username;
            if ($message !== '') {
                file_put_contents($messagesFile, $username.': '.$message."\n", FILE_APPEND);
            }
            $info = "Login successful. Message added.";
        } else {
            $info = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login/Register and Write Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Messages</h2>
    <div class="card mb-4">
        <div class="card-body">
            <?php
            if (!empty($info)) echo '<div class="alert alert-info">'.$info.'</div>';
            if (file_exists($messagesFile)) {
                $lines = file($messagesFile);
                foreach ($lines as $line) {
                    echo '<div>'.htmlspecialchars($line).'</div>';
                }
            } else {
                echo "<div>No messages yet.</div>";
            }
            ?>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
      Login / Register
    </button>
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Login or Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Please choose an action:</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="window.location.href='login.php'">Login</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='register.php'">Register</button>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>