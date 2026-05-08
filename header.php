<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleheader.css">
</head>
<body>
    <section class="main">
        <nav class="mainnav">
            <section class="navobj">
                <a class="navbutton" href="index.php">Hem</a>
            </section>
            <section class="navobj">
                <?php 
                if (isset($_SESSION['userLoggedIn'])) {
                    if ($_SESSION['userLoggedIn'] == 1) { ?>
                        <a class="navbutton" href="schemaoverview.php">Konto</a>
                    <?php } else { ?>
                        <a class="navbutton" href="login.php">Logga in</a>
                    <?php }
                } else { ?>
                    <a class="navbutton" href="login.php">Logga in</a>    
                <?php } ?>
            </section>
        </nav>
    </section>
</body>
</html>