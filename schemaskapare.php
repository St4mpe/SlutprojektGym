<?php 
require_once("functions.php");

$_SESSION['isFromTemplate'] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleschemaskapare.css">
    <script src="schemaskapare.js"></script>
</head>
<body>
    <header>
        <h1>Schema Skaparen</h1>
    </header>
    <?php require_once("header.php"); ?>
    <section class="schemanamn">
        <span id="schedule-name">Namn på Schema:</span>
        <input type="text" name="scheeduleName" maxlength="20" pattern="[a-zA-ZåäöÅÄÖ0-9]{1,20}" title="Enbart sammahängande namn utan specialtecken är tillåtet" required>
    </section>
    <section class="main">
        <section id="exercises-container"></section>
        <section class="add-or-remove-excersice">
            <button class="formbutton" type="button" onclick="addExercise()">Lägg till övning</button>
            <button class="formbutton" type="button" onclick="removeExercise()">Ta bort övning</button>
        </section>
        <section class="save">
            <button class="button" type="button" onclick="back()">Tillbaka</button>  
            <button class="button" type="button" onclick="collectWorkoutData()">Spara Pass</button> 
        </section>
    </section>
</body>
</html>