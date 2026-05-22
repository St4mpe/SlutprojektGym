<?php
require 'functions.php';

$data = json_decode(file_get_contents('php://input'), true);
$name = (string) $data['name'];
$sets = (int) $data['sets'];

$query = "INSERT INTO excercisescompleted() VALUES ('$name', '{$_SESSION['loggedInUserId']}'";
echo json_encode(false);

?>