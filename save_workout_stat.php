<?php
require 'functions.php';

$data = json_decode(file_get_contents('php://input'), true);
$procent  = (int)    $data['procent'];
$name = (string) $data['name'];

$sql = "INSERT INTO finishedworkouts(workout, completion, linkeduser) VALUES ('$name', '$procent', {$_SESSION['loggedInUserId']})";

mysqli_query($conn, $sql);
?>