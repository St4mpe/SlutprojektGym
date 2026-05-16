document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('exercises-container');

    // scheduleData is already a parsed JS object from the PHP embed
    document.querySelector('input[name="scheeduleName"]').value = scheduleData.scheduleName;

    scheduleData.exercises.forEach((exercise) => {
        const el = createExercise(exercise);
        container.appendChild(el);
    });
});

function createExercise(exerciseData) {
    const section = document.createElement('section');
    section.className = 'baseplate';

    section.innerHTML = `
        <section class="name-of-excersice">
            <input class="name" type="text" name="excersice" value="${exerciseData.name}" maxlength="20">
            <section class="line"></section>
        </section>
        <section class="sets-container"></section>`;

    const setsContainer = section.querySelector('.sets-container');
    exerciseData.sets.forEach((set) => {
        setsContainer.appendChild(createSetRow(set));
    });

    return section;
}

function createSetRow(setData) {
    const row = document.createElement('section');
    row.className = 'set-row';

    row.innerHTML = `
        <span class="set-label">Set ${setData.set}</span>
        <section>
            <span class="set-label">Reps: </span>
            <span class="reps">${setData.reps}</span>
        </section>
        <section>
            <span class="set-label">Weight (Kg): </span>
            <span>${setData.weight}</span>
        </section>
        <section>
            <span class="set-label">RPE: </span>
            <span>${setData.rpe}</span>
        </section>
    `;

    return row;
}