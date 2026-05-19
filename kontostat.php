<?php 
require_once("functions.php");

/* Genomsnittlit genomförande */
$sql = "SELECT completion FROM finishedworkouts WHERE linkeduser = {$_SESSION['loggedInUserId']}";
$result = mysqli_query($conn, $sql);
$rows = [];
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row['completion'];
}

/* Cirkel Avklarade pass av de skapade*/
$sqlWorkouts = "SELECT * FROM workouts WHERE linkeduser = {$_SESSION['loggedInUserId']}";
$resultW = mysqli_query($conn, $sqlWorkouts);
$NOEW=0;
while($row = mysqli_fetch_assoc($resultW)) {
    $NOEW++;
}

$sqlCompleted = "SELECT * FROM workouts WHERE linkeduser = {$_SESSION['loggedInUserId']} AND completed=1";
$resultC = mysqli_query($conn, $sqlCompleted);
$NOEC=0;
while($row = mysqli_fetch_assoc($resultC)) {
    $NOEC++;
}

$procentage = round(($NOEC / $NOEW) * 100);    
echo $procentage;

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
    <section class="vänster-kolumn">
        <section class="progressbars">
            <section class="avg-bar">
                <h2>Genomsnittligt Genomförande</h2>
                <section>
                    <p id="avg-fill">0%</p>
                    <section class="background-fill">
                        <section class="bar-bg">
                            <section class="avg-bar-fill"></section>
                        </section>
                    </section>
                </section>
            </section>
            <section class="circleProgress">
                <section class="centerHeader">
                    <h2>Avlsutade pass av de skapade:</h2>
                </section>
                <section class="circle-wrapper">
                    <section class="circle" style="--progress: <?php echo $procentage; ?>%"></section>
                    <span data-progress="<?php echo $procentage; ?>%">Totalt</span>
                </section>
            </section>
        </section>
        <section class="extra-ruta">
            
        </section>
    </section>
    <section class="avklaradepass">
        <h2>Genomförda pass</h2>
        <section class="avklarepasslista">
            <?php 
                $sqlworkouts = "SELECT * FROM finishedworkouts WHERE linkeduser = {$_SESSION['loggedInUserId']}"; 
                $resultworkouts = mysqli_query($conn, $sqlworkouts);?>
                <section class="listoutput">
                    <p><u>Schema:</u></p>
                    <p><u>Procent:</u></p>
                    <P><u>Datum:</u></P>
                </section>
                <?php
                while($row = mysqli_fetch_assoc($resultworkouts)):
                    $date = new DateTime($row['timecompleted']);?>
                <section class="listoutput">
                    <p><?php echo $row['workout'] ?></p>
                    <p><?php echo $row['completion'] ?>%</p>
                    <p><?php echo $date->format('Y-m-d');?></p>
                </section>
                <?php endwhile; ?>
                <section class="historikknapp">
                    <a href="historik.php">Se Historik</a>
                </section>
        </section>
    </section>
</section>
</body>
</html>