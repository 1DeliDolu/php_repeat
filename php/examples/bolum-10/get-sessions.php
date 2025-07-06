<?php

    session_start();

    // Clear all session variables
    $_SESSION = [];

    // Check if 'username' exists in session
    if (isset($_SESSION["username"])) {
        echo $_SESSION["username"];
    } else {
        echo "username not found";
    }

    // This will not output anything because the session is cleared above
    echo $_SESSION["password"];

    // Print the session array (will be empty)
    print_r($_SESSION);

?>