<?php
require 'functions.php';
 
$data = json_decode(file_get_contents('php://input'), true);
$name = (string) $data['name'];
$sets = (int) $data['sets'];
$userId = (int) $_SESSION['loggedInUserId'];

$stmt = "UPDATE excercisescompleted SET antal = antal + $sets WHERE namn = '$name' AND linkeduser = $userId";
mysqli_query($conn, $stmt);
?>