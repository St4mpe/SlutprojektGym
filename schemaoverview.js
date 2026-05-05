let numExercises = 1;

function createSetRow(setNumber) {
    const row = document.createElement('section');
    row.className = 'set-row';

    row.innerHTML = `
        <span class="set-label">Set ${setNumber}</span>
        <section>
            <span class="set-label">Reps: </span>
            <input id="reps" type="text" name="reps" min="1" max="999">
        </section>
        <section>
            <span class="set-label">Weight (Kg): </span>
            <input type="text" name="weight" min="0" max="9999">
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
            <input class="name" type="text" name="excersice" placeholder="Excersice name" maxlength="20" pattern="[a-zA-ZåäöÅÄÖ]{1,40}">
            <section class="line"></section>
        </section>
        <section class="">
        
        </section>
        <section class="sets-container"></section>
        <section class="exercise-buttons">
            <button class="formbutton" type="button" onclick="addSet(this)">Add set</button>
            <button class="formbutton" type="button" onclick="removeSet(this)">Remove set</button>
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

document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('exercises-container');
    container.appendChild(createExercise(1));
});