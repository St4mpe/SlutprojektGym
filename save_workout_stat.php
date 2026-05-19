<?php
require 'functions.php';

$data = json_decode(file_get_contents('php://input'), true);
$procent  = (int)    $data['procent'];
$name = (string) $data['name'];

$sqlstat = "INSERT INTO finishedworkouts(workout, completion, linkeduser) VALUES ('$name', '$procent', {$_SESSION['loggedInUserId']})";
mysqli_query($conn, $sqlstat);

$sqlworkout = "UPDATE workouts SET completed='1' WHERE schedule_name='$name'";
mysqli_query($conn, $sqlworkout);
?>