<?php
require 'functions.php';
 
$data = json_decode(file_get_contents('php://input'), true);
$name = (string) $data['name'];
$sets = (int) $data['sets'];
$userId = (int) $_SESSION['loggedInUserId'];
 
$stmt = "INSERT INTO excercisescompleted (namn, antal, linkeduser) VALUES ('$name', $sets, $userId)";
mysqli_query($conn, $stmt);
?>