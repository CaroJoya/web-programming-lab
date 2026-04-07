<?php
include 'db.php';
if (isset($_POST['id'])) {
    $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
    $stmt->bind_param("i", $_POST['id']);
    echo $stmt->execute() ? "1" : "0";
}
?>