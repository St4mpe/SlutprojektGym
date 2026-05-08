<?php 
require_once("functions.php");

if (isset($_POST['logout']))
{
    $_SESSION['userLoggedIn'] = false;
    header("Location: index.php");
    exit();
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
        <h1>Min sida</h1>
    </section>
    <?php require_once("header.php"); ?>
    <section class="main">
        <section>
            <a href="schemaskapare.php"> Schemaskaparen</a>
        </section>
    </section>
    <section class="form">
            <form class="logout-form" action="schemaoverview.php" method="POST">
                <input class="logoutbutton" type="submit" value="Log out" name="logout"/>
            </form>
    </section>
</body>
</html>