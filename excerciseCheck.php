<?php
require 'functions.php';

$data = json_decode(file_get_contents('php://input'), true);
$name = (string) $data['name'];

$sql = "SELECT * FROM excercisescompleted WHERE namn='$name' AND linkeduser='{$_SESSION['loggedInUserId']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
if ($row > 0) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}
?>