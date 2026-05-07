<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleschemaoverview.css">
    <script src="schemaoverview.js"></script>
</head>
<body>
    <header>
        <h1>Schema Skaparen</h1>
    </header>
    <section>
        <span class="set-label" id="schedule-name">Name of Schedule</span>
        <input type="text" name="scheeduleName" min="0" max="9999">
    </section>
    <section class="main">
        <section id="exercises-container"></section>
        <section class="add-or-remove-excersice">
            <button class="formbutton" type="button" onclick="addExercise()">Add excersice</button>
            <button class="formbutton" type="button" onclick="removeExercise()">Remove excersice</button>
            <button class="formbutton" type="button" onclick="collectWorkoutData()">Save Workout</button>
        </section>
    </section>
</body>
</html>