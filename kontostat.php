<?php 
require_once("functions.php");

$crp=new Crypt();

$sql = "SELECT completion FROM finishedworkouts WHERE linkeduser = {$_SESSION['loggedInUserId']}";
$result = mysqli_query($conn, $sql);
$rows = [];
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row['completion'];
}

$sqlUser = "SELECT * FROM userinfo WHERE id={$_SESSION['loggedInUserId']}";
$resultuser = mysqli_query($conn, $sqlUser);
$rowUser = mysqli_fetch_assoc($resultuser);

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

if ($NOEC != 0 || $NOEW != 0)
{
    $procentage = round(($NOEC / $NOEW) * 100);    
}
else
{
    $procentage = 0;
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
    <script>
        const progressData = <?= json_encode($rows); ?>;
    </script>
    <script src="statistik.js"></script>
</head>
<body>
    <section class="headername">
        <h1>Konto</h1>
    </section>
    <?php require_once("header.php"); ?>
    <section class="navKonto">
        <section class="showuser">
            <p>Inloggad användare: </p>
            <p> <?php echo $crp->dec($rowUser['user'])?> </p>
        </section>
        <section class="navbuttons">
            <a href="schemaoverview.php">Skapa</a>
            <a class="selected" href="kontostat.php">Statistik</a>
        </section>
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
        <section class="sets-track-ruta">
            <h2>Övningar</h2>
            <section class="setListBox">
                <?php 
                    $sqlExLst = "SELECT * FROM excercisescompleted WHERE linkeduser={$_SESSION['loggedInUserId']} ORDER BY antal DESC";
                    $resultExLst = mysqli_query($conn, $sqlExLst);?>
                    <section class="setsLista">
                        <p class="setsListaHead">Övning</p>
                        <p class="setsListaHead">Loggade sets</p>
                    </section>
                    <?php
                    while($rowLst = mysqli_fetch_assoc($resultExLst)):?>
                        <section class="setsLista">
                            <p class="setsListaEx"><?php echo $rowLst['namn'] ?></p>
                            <p class="setsListaEx"><?php echo $rowLst['antal'] ?></p>  
                        </section>
                    <?php
                    endwhile;
                    if(mysqli_num_rows($resultExLst) == 0)
                    {?>
                        <section class="setsListaTom">
                            <p>Du har inte loggat några övningar än</p>
                        </section>
                    <?php
                    }
                ?>
            </section>
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