<?php 
require_once("functions.php");

$id = mysqli_real_escape_string($conn, $_SESSION['laddaschemaid']);
$sql = "SELECT data FROM workouts WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION['isFromTemplate'] = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleschemaskapare.css">
    <link rel="stylesheet" href="schematittare.css">
    <script src="mall.js"></script>
    <script>
        const scheduleData = <?= $row['data'] ?>;
    </script>
</head>
<body>
    <header>
        <h1>Mall</h1>
    </header>
    <?php require_once("header.php"); ?>
    <section class="schemanamn">
        <span id="schedule-name">Name of Schedule:</span>
        <input id="scheeduleName" required></input>
    </section>
    <section class="main">
        <section id="exercises-container"></section>
        <section class="save">
            <button class="button" type="button" onclick="back()">Tillbaka</button>  
            <button class="button" type="button" onclick="collectWorkoutData()">Save Workout</button> 
        </section>
    </section>
</body>
</html>