<?php 
require_once("functions.php");

$id = mysqli_real_escape_string($conn, $_SESSION['laddaschemaid']);
$sql = "SELECT data FROM workouts WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleschemaskapare.css">
    <link rel="stylesheet" href="schematittare.css">
    <script src="scheamtittare.js"></script>
    <script>
        const scheduleData = <?= $row['data'] ?>;
    </script>
</head>
<body>
    <header>
        <h1>Schema Tittaren</h1>
    </header>
    <?php require_once("header.php"); ?>
    <section class="schemanamn">
        <span id="schedule-name">Name of Schedule:</span>
        <span id="scheeduleName"></span>
    </section>
    <section class="main">
        <section id="exercises-container"></section>
        <section class="tillbakaknapp">
            <a href="schemaoverview.php">Tillbaka</a>
        </section>
    </section>
</body>
</html>