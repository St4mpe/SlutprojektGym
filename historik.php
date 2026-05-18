<?php 
require_once("functions.php");

$sql = "SELECT * FROM finishedworkouts WHERE linkeduser = {$_SESSION['loggedInUserId']}";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="historik.css">
    <link rel="stylesheet" href="navKonto.css">
    <script src="statistik.js"></script>
    <script>
        const progressData = <?= json_encode($rows) ?>;
    </script>
</head>
<body>
    <section class="headername">
        <h1>Konto</h1>
    </section>
    <?php require_once("header.php"); ?>
    <section class="navKonto">
        <a href="schemaoverview.php">Skapa</a>
        <a class="gra" href="kontostat.php">Statistik</a>
    </section>
    <section class="box">
        <?php
            while($row = mysqli_fetch_assoc($result)):
                $date = new DateTime($row['timecompleted']);?>
            <section class="listoutput">
                <p><?php echo $row['workout'] ?></p>
                <p><?php echo $row['completion'] ?>%</p>
                <p><?php echo $date->format('Y-m-d');?></p>
                <button class="button" type="button">Radera</button>
            </section>
        <?php endwhile; ?>
    </section>
    <section class="tillbakabutton" >
        <a href="kontostat.php">Tillbaka</a>
    </section>
</body>
</html>