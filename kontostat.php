<?php 
require_once("functions.php");

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
    <section class="statruta">
        <section class="avg-bar">
            <h2>Genomsnittligt Genomförande</h2>
            <section>
                <p id="avg-fill"></p>
                <section class="background-fill">
                    <section class="bar-bg">
                        <section class="avg-bar-fill"></section>
                    </section>
                </section>
            </section>
        </section>
        <section class="avklaradepass">
            <h2>Avklaradepass</h2>
            <section class="avklarepasslista">
                <?php 
                    $sqlworkouts = "SELECT * FROM finishedworkouts WHERE linkeduser = {$_SESSION['loggedInUserId']}"; 
                    $resultworkouts = mysqli_query($conn, $sqlworkouts);
                    while($row = mysqli_fetch_assoc($resultworkouts)):?>
                    <section>
                        <p><?php echo $row['workout'] ?></p>
                    </section>
                    <?php endwhile; ?>
            </section>
        </section>
    </section>
</body>
</html>