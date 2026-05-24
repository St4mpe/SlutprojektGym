<?php
require 'functions.php';
 
$data = json_decode(file_get_contents('php://input'), true);
$name = (string) $data['name'];
$userId = (int) $_SESSION['loggedInUserId'];
 
$stmt = $conn->prepare("SELECT * FROM excercisescompleted WHERE namn = ? AND linkeduser = ?");
$stmt->bind_param("si", $name, $userId);
$stmt->execute();
$result = $stmt->get_result();
$rowCount = $result->num_rows;
 
$stmt->close();
 
header('Content-Type: application/json');
if ($rowCount > 0) {
    echo json_encode("true");
} else {
    echo json_encode("false");
}
?>