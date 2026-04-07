<?php
include 'db.php';

$search = $_GET['search'] ?? '';
$searchTerm = "%$search%";

$stmt = $conn->prepare("SELECT * FROM students WHERE name LIKE ? OR email LIKE ? OR phone LIKE ? ORDER BY id DESC");
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td class='text-center'>
                <button class='btn btn-sm btn-outline-success editBtn' data-id='{$row['id']}' data-name='{$row['name']}' data-email='{$row['email']}' data-phone='{$row['phone']}'>Edit</button>
                <button class='btn btn-sm btn-outline-danger deleteBtn' data-id='{$row['id']}'>Delete</button>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center text-muted'>No students found.</td></tr>";
}
?>