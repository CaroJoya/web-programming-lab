<?php
session_start();
include 'db.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s",$username);
$stmt->execute();

$result = $stmt->get_result();

// Check if user exists
if($result->num_rows == 1){

    $user = $result->fetch_assoc();

    // Check password
    if(password_verify($password, $user['password'])){

        $_SESSION['user'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['last_activity'] = time();

        // Remember Me
        if(isset($_POST['remember'])){
            setcookie("user", $user['username'], time() + (86400 * 7)); // 7 days
    }
        header("Location: dashboard.php");

    }else{
        header("Location:index.php?error=password");
    }

}else{
    header("Location:index.php?error=user");
}
?>