<?php
require 'functions.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$loggedinuser = $_SESSION['loggedInUserId'];

if (!$data) {
    echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    exit;
}

$scheduleName = mysqli_real_escape_string($conn, $data['scheduleName']);
$jsonEscaped = mysqli_real_escape_string($conn, $json);

$templatecheck = $_SESSION['isTemplate'];
$query = "INSERT INTO workouts(schedule_name, data, linkeduser, istemplate) VALUES ('$scheduleName', '$jsonEscaped', '$loggedinuser', '$templatecheck')";

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true, 'id' => mysqli_insert_id($conn)]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>