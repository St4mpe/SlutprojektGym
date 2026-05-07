<?php
require 'functions.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    exit;
}

$scheduleName = mysqli_real_escape_string($conn, $data['scheduleName']);
$jsonEscaped = mysqli_real_escape_string($conn, $json);

$query = "INSERT INTO workouts (schedule_name, data) VALUES ('$scheduleName', '$jsonEscaped')";

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true, 'id' => mysqli_insert_id($conn)]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>