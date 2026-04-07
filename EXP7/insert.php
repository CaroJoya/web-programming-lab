<?php
include 'db.php';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $stmt = $conn->prepare("INSERT INTO students (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['name'], $_POST['email'], $_POST['phone']);
    echo $stmt->execute() ? "1" : "0";
}
?>