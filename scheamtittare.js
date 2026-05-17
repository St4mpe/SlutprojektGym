document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('exercises-container');

    document.getElementById('scheeduleName').textContent = scheduleData.scheduleName;

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
            <span class="name">${exerciseData.name}</span>
            <span class="line"></span>
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
        <span class="label set-label">Set ${setData.set}</span>
        <section>
            <span class="label">Reps: </span>
            <span class="reps">${setData.reps}</span>
        </section>
        <section>
            <span class="label">Weight (Kg): </span>
            <span>${setData.weight}</span>
        </section>
        <section>
            <span class="label">RPE: </span>
            <span>${setData.rpe}</span>
        </section>
        <section>
            <span class="label">Completed: </span>
            <input type="checkbox" name="completed" min="0" max="9999">
        </section>
    `;

    return row;
}

function back(){
    location.href = "schemaoverview.php";
}

function completeWorkout(){
    const allCheckbox = document.querySelectorAll('input[type="checkbox"]');
    let totalbox = 0;
    let checkedboxes = 0;


    allCheckbox.forEach((box) => {
        totalbox++;
        if (box.checked)
        {
            checkedboxes++;
        }
    });

    let procentage = Math.round((checkedboxes / totalbox) * 100);

    console.log(procentage);
};