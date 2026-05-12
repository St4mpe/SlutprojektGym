let numExercises = 1;

function createSetRow(setNumber) {
    const row = document.createElement('section');
    row.className = 'set-row';

    row.innerHTML = `
        <span class="set-label">Set ${setNumber}</span>
        <section>
            <span class="set-label">Reps: </span>
            <section class="reps"></section>
        </section>
        <section>
            <span class="set-label">Weight (Kg): </span>
            <section class="reps"></section>
        </section>
        <section>
            <span class="set-label">RPE: </span>
            <section class="reps"></section>
        </section>
        <section>
            <span class="set-label">Completed: </span>
            <section class="reps"></section>
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

function createExercise(i) {
    const section = document.createElement('section');
    section.className = 'baseplate';

    section.innerHTML = `
        <section class="name-of-excersice">
            <input class="name" type="text" name="excersice" placeholder="Excersice name" maxlength="20" pattern="[a-zA-ZåäöÅÄÖ]{1,40}">
            <section class="line"></section>
        </section>
        <section class="sets-container"></section>`;

    section.querySelector('.sets-container').appendChild(createSetRow(1));

    return section;
}

document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('exercises-container');
    container.appendChild(createExercise(1));

    console.log(workoutData);
});