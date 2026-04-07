<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card p-4">

<h3>Register</h3>

<form method="POST">

<input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<div class="input-group mb-3">
<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
<button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')">👁</button>
</div>

<div class="input-group mb-3">
<input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
<button type="button" class="btn btn-outline-secondary" onclick="togglePassword('confirm_password')">👁</button>
</div>

<button class="btn btn-success">Register</button>

</form>

</div>
</div>

<script>
function togglePassword(fieldId){
var field = document.getElementById(fieldId);

if(field.type === "password"){
field.type = "text";
}else{
field.type = "password";
}
}
</script>

</body>
</html>

<?php

if(isset($_POST['username'])){

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password !== $confirm_password){
    echo "<script>alert('Passwords do not match')</script>";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users(username,password,email) VALUES(?,?,?)");
$stmt->bind_param("sss",$username,$hashed_password,$email);
$stmt->execute();

echo "<script>alert('User Registered Successfully')</script>";

}
?>