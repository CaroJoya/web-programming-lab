<?php
session_start();

// Auto login using cookies
if(isset($_COOKIE['user'])){
    $_SESSION['user'] = $_COOKIE['user'];
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Login System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:linear-gradient(135deg,#6366f1,#3b82f6);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.login-card{
width:350px;
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
</style>

</head>

<body>

<div class="login-card">

<h3 class="text-center mb-4">Login</h3>

<form action="login.php" method="POST">

<input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

<div class="input-group mb-3">
<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
<button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁</button>
</div>

<div class="form-check mb-3">
<input type="checkbox" name="remember" class="form-check-input">
<label class="form-check-label">Remember Me</label>
</div>

<button class="btn btn-primary w-100">Login</button>

</form>

<?php if(isset($_GET['error'])){ ?>

    <?php if($_GET['error'] == "user"){ ?>
        <div class="alert alert-danger mt-3">User not found</div>
    <?php } ?>

    <?php if($_GET['error'] == "password"){ ?>
        <div class="alert alert-danger mt-3">Incorrect password</div>
    <?php } ?>

<?php } ?>

<?php if(isset($_GET['timeout'])){ ?>
<div class="alert alert-warning mt-3">Session expired. Please login again.</div>
<?php } ?>

</div>

<script>
function togglePassword(){
var pass = document.getElementById("password");

if(pass.type === "password"){
pass.type = "text";
}else{
pass.type = "password";
}
}
</script>

</body>
</html>