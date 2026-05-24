<?php 
require_once("functions.php");

if (isset($_POST['logout']))
{
    $_SESSION['userLoggedIn'] = false;
    header("Location: index.php");
    exit();
}

if (isset($_POST['tabort']))
{
    $schemaid = $_POST['schemaid'];
    $sql = "DELETE FROM workouts WHERE id = $schemaid AND linkeduser = {$_SESSION['loggedInUserId']}";
    mysqli_query($conn, $sql);
    header("Location: schemaoverview.php");
    exit();
}

if (isset($_POST['laddaschema']))
{
    $_SESSION['laddaschemaid'] =  $_POST['schemaid'];
    header("Location: scehamtittare.php");
}

if (isset($_POST['laddamall']))
{
    $_SESSION['laddaschemaid'] =  $_POST['schemaid'];
    header("Location: mall.php");
}

if (isset($_POST['redigeramall']))
{
    $_SESSION['laddaschemaid'] =  $_POST['schemaid'];
    header("Location: redigeramall.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="schemaoverviewstyle.css">
    <link rel="stylesheet" href="navKonto.css">
</head>
<body>
    <section class="headername">
        <h1>Konto</h1>
    </section>
    <?php require_once("header.php"); ?>
    <section class="navKonto">
        <a class="gra" href="schemaoverview.php">Skapa</a>
        <a href="kontostat.php">Statistik</a>
    </section>
    <section class="main">
        <section class="alterativskapa">
            <section class="skapa">
                <h2>Skapa Nytt Schema</h2>
                <a href="schemaskapare.php">Schemaskaparen</a>
            </section>
            <section class="skapa">
                <h2>Skapa Schema Från Mall</h2>
                <section class="mallar">
                    <section class="skapadescheman">
                        <?php 
                        $sqlworkout = "SELECT * FROM workouts WHERE linkeduser = {$_SESSION['loggedInUserId']} AND isfromemplate = 0";
                        $resultworkout = mysqli_query($conn, $sqlworkout);

                        while($rowSchema = mysqli_fetch_assoc($resultworkout)): ?>
                            <section class="indischeman">
                                <?php echo $rowSchema['schedule_name']; ?>
                                <section>
                                    <form class="load-form" action="schemaoverview.php" method="POST">
                                        <input type="hidden" name="schemaid" value="<?php echo $rowSchema['id']?>">
                                        <input class="ladda" type="submit" value="Ladda redigerbar mall" name="redigeramall"/>
                                        <input class="ladda" type="submit" value="Ladda Statisk Mall" name="laddamall"/>
                                    </form>
                                </section>
                            </section>
                        <?php endwhile; ?>
                    </section>
                </section>
            </section>
        </section>
        <section class="load">
            <h2>Ladda Schema</h2>
            <section class="skapadescheman">
                <?php 
                $sqlworkout = "SELECT * FROM workouts WHERE linkeduser = {$_SESSION['loggedInUserId']}";
                $resultworkout = mysqli_query($conn, $sqlworkout);

                while($rowSchema = mysqli_fetch_assoc($resultworkout)): ?>
                    <section class="indischeman">
                        <?php echo $rowSchema['schedule_name']; ?>
                        <section>
                            <form class="load-form" action="schemaoverview.php" method="POST">
                                <input type="hidden" name="schemaid" value="<?php echo $rowSchema['id']?>">
                                <input class="ladda" type="submit" value="Ladda Schema" name="laddaschema"/>
                                <input class="bort" type="submit" value="Ta Bort" name="tabort"/>
                            </form>
                        </section>
                    </section>
                <?php endwhile; ?>
            </section>
        </section>
    </section>
    <section class="form">
        <form class="logout-form" action="schemaoverview.php" method="POST">
            <input class="logoutbutton" type="submit" value="Logga ut" name="logout"/>
        </form>
    </section>
</body>
</html>