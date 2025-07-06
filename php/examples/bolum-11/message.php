<?php
session_start();
$users = ['user1', 'user2'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'dosya2.txt';
    $username = $_POST['username'] ?? '';
    $message = $_POST['message'] ?? '';
    $datetime = date('Y-m-d H:i:s');
    $line = $username . ' | ' . $message . ' | ' . $datetime . "\n";
    file_put_contents($file, $line, FILE_APPEND);
}
$chatHistory = [];
if (file_exists('dosya2.txt')) {
    $chatHistory = file('dosya2.txt');
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Two User Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">User 1</div>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="username" value="user1">
                        <div class="mb-3">
                            <label for="message1" class="form-label">Message</label>
                            <input type="text" class="form-control" id="message1" name="message" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send as user1</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-secondary text-white">Chat History</div>
                <div class="card-body" style="min-height:150px;">
                    <?php
                    if ($chatHistory) {
                        foreach ($chatHistory as $line) {
                            echo '<div>' . htmlspecialchars($line) . '</div>';
                        }
                    } else {
                        echo '<div>No messages yet.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">User 2</div>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="username" value="user2">
                        <div class="mb-3">
                            <label for="message2" class="form-label">Message</label>
                            <input type="text" class="form-control" id="message2" name="message" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Send as user2</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-secondary text-white">Chat History</div>
                <div class="card-body" style="min-height:150px;">
                    <?php
                    if ($chatHistory) {
                        foreach ($chatHistory as $line) {
                            echo '<div>' . htmlspecialchars($line) . '</div>';
                        }
                    } else {
                        echo '<div>No messages yet.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>