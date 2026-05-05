<?php 
session_start();

if (!isset($_SESSION['numexcersice'])) {
    $_SESSION['numexcersice'] = 1;
}

if (isset($_POST['home'])){
    header("Location: index.php");
}

if (isset($_POST['add'])){
    $_SESSION['numexcersice']++;
    header("Location: schemaoverview.php");
}

if (isset($_POST['remove'])){
    if ($_SESSION['numexcersice'] > 1)
    {
        $_SESSION['numexcersice']--;
        header("Location: schemaoverview.php");   
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleschemaoverview.css">
</head>
<body>
    <header>
        <h1>Schema Skaparen</h1>
    </header>
    <section class="main">
        <?php 
        for($i = 1; $i <= $_SESSION['numexcersice']; $i++)
        {?>
            <section class="baseplate">
                
            </section>
        <?php 
        }?>
        <form class="add-or-remove-excersice" action="schemaoverview.php" method="POST">
            <input type="submit" value="add excersice" name="add">
            <input type="submit" value="Go Home" name="home">
            <input type="submit" value="remove excersice" name="remove">
        </form>
    </section>
</body>
</html>