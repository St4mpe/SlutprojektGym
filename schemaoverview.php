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
    <section class="main">
        <section id="exercises-container">
            <section class="name-of-excersice">
                <input id="Name" type="text" name="excersice" placeholder="Excersice name" maxlength="20" pattern="[a-zA-ZåäöÅÄÖ]{1,40}">
                <section class="line"></section>
            </section>
        </section>

        <section class="add-or-remove-excersice">
            <button class="formbutton" onclick="addExercise()">Add excersice</button>
            <button class="formbutton" onclick="removeExercise()">Remove excersice</button>
        </section>
    </section>
</body>
</html>