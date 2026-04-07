<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

// Session timeout
if(isset($_SESSION['last_activity'])){
    if(time() - $_SESSION['last_activity'] > 300){
        session_unset();
        session_destroy();
        header("Location:index.php?timeout=1");
        exit();
    }
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 text-center">

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<hr>

<h4>User Profile</h4>

<p><strong>ID:</strong> <?php echo $_SESSION['id']; ?></p>
<p><strong>Username:</strong> <?php echo $_SESSION['user']; ?></p>
<p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>

<button onclick="confirmLogout()" class="btn btn-danger mt-3">Logout</button>

</div>

</div>

<script>
function confirmLogout(){
    var confirmAction = confirm("Are you sure you want to logout?");
    
    if(confirmAction){
        window.location.href = "logout.php";
    }
}
</script>

</body>
</html>