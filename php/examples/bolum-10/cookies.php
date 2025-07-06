<?php

setcookie("username", "sadikturan", time() + (60  * 60 * 24));
setcookie("auth", "true", time() + (60  * 60 * 24));

if(isset($_COOKIE["username"])) {
    echo $_COOKIE["username"];
} else {
    echo "no cookie";
}

echo $_COOKIE["auth"];

// update
setcookie("username", "admin", time() + (60  * 60 * 24));

// delete
setcookie("username", "sadikturan", time() - (3600));

?>
