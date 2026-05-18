<?php 
require_once("functions.php");

$id = mysqli_real_escape_string($conn, $_SESSION['laddaschemaid']);
$sql = "SELECT completion FROM finishedworkouts WHERE linkeduser = {$_SESSION['loggedInUserId']}";
$result = mysqli_query($conn, $sql);
$rows = [];
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row['completion'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylekontostat.css">
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
    <section>
        <section class="background">
            <section class="bar-bg">
                <section class="bar-fill" style="width:25%;"></section>
            </section>
        </section>
    </section>
</body>
</html>