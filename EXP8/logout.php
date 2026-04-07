<?php
session_start();

// Destroy session
session_destroy();

// Delete cookie
if(isset($_COOKIE['user'])){
    setcookie("user", "", time() - 3600);
}

header("Location:index.php");
?>