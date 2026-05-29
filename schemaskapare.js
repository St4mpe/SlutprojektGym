async function collectWorkoutData() {
    const allInputs = document.querySelectorAll('input[required]');
    for (const input of allInputs) {
        if (!input.reportValidity()) return;
    }

    const scheduleName = document.querySelector('input[name="scheeduleName"]').value;
    const workoutData = {
        scheduleName: scheduleName,
        exercises: []
    };

    const baseplates = document.querySelectorAll('.baseplate');

    baseplates.forEach((baseplate, exerciseIndex) => {
        const exerciseName = baseplate.querySelector('input[name="excersice"]').value;
        const sets = [];

        const setRows = baseplate.querySelectorAll('.set-row');

        setRows.forEach((row, setIndex) => {
            const reps = row.querySelector('input[name="reps"]').value;
            const weight = row.querySelector('input[name="weight"]').value;
            const rpe = row.querySelector('input[name="rpe"]').value;

            sets.push({
                set: setIndex + 1,
                reps: reps,
                weight: weight,
                rpe: rpe,
            });
        });

        workoutData.exercises.push({
            exercise: exerciseIndex + 1,
            name: exerciseName,
            sets: sets
        });
    });

    const json = JSON.stringify(workoutData, null, 2);

    const response = await fetch('save_workout.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: json
    });

    console.log(response);

    location.href = "schemaoverview.php";
}

let numExercises = 1;

function createSetRow(setNumber) {
    const row = document.createElement('section');
    row.className = 'set-row';

    row.innerHTML = `
        <span class="label set-label">Set ${setNumber}</span>
        <section>
            <span class="label">Reps: </span>
            <input class="reps" type="text" name="reps" maxlength="4" pattern="[0-9]{0,4}" title="Endast siffror är tillåtna" required>
        </section>
        <section>
            <span class="label">Vikt (Kg): </span>
            <input type="text" name="weight" maxlength="4" pattern="[0-9]{0,4}" title="Endast siffror är tillåtna" required>
        </section>
        <section>
            <span class="label">RPE: </span>
            <input type="text" name="rpe" maxlength="2" pattern="[0-9]+|-{0,2}" title="Skriv antingen ett tal (endast siffror) eller ett ensamt minustecken (-)" required>
        </section>
    `;

    return row;
}

function addSet(button) {
    const baseplate = button.closest('.baseplate');
    const container = baseplate.querySelector('.sets-container');
    const setNumber = container.children.length + 1;
    container.appendChild(createSetRow(setNumber));
}

function removeSet(button) {
    const baseplate = button.closest('.baseplate');
    const container = baseplate.querySelector('.sets-container');
    if (container.children.length > 0) {
        container.removeChild(container.lastElementChild);
    }
}

function createExercise(i) {
    const section = document.createElement('section');
    section.className = 'baseplate';

    section.innerHTML = `
        <section class="name-of-excersice">
            <input class="name" type="text" name="excersice" placeholder="Namn på övningen" maxlength="50" pattern="[a-zA-ZåäöÅÄÖ]{1,50}" title="Endast bokstäver är tillåtna" required>
            <section class="line"></section>
        </section>
        <section class="sets-container"></section>
        <section class="exercise-buttons">
            <button class="formbutton" type="button" onclick="addSet(this)">Lägg till set</button>
            <button class="formbutton" type="button" onclick="removeSet(this)">Ta bort set</button>
        </section>
    `;

    section.querySelector('.sets-container').appendChild(createSetRow(1));

    return section;
}

function addExercise() {
    numExercises++;
    const container = document.getElementById('exercises-container');
    container.appendChild(createExercise(numExercises));
}

function removeExercise() {
    if (numExercises > 1) {
        const container = document.getElementById('exercises-container');
        container.removeChild(container.lastElementChild);
        numExercises--;
    }
}

function back(){
    location.href = "schemaoverview.php";
}

document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('exercises-container');
    container.appendChild(createExercise(1));
});