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

if (isset($_POST['ladda']))
{
    $_SESSION['laddaschemaid'] =  $_POST['schemaid'];
    header("Location: scehamtittare.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="schemaoverviewstyle.css">
</head>
<body>
    <section class="headername">
        <h1>Konto</h1>
    </section>
    <?php require_once("header.php"); ?>
    <section class="main">
        <section class="skapa">
            <h2 >Skapa Schema</h2>
            <a href="schemaskapare.php"> Schemaskaparen</a>
        </section>
        <section class="load">
            <h2 >Ladda Schema</h2>
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
                                <input class="ladda" type="submit" value="Ladda Schema" name="ladda"/>
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
                <input class="logoutbutton" type="submit" value="Log out" name="logout"/>
            </form>
    </section>
</body>
</html>