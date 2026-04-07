<?php
include 'db.php';
if (isset($_POST['id'])) {
    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['id']);
    echo $stmt->execute() ? "1" : "0";
}
?>