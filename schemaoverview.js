let numExercises = 1;

function renderExercises() {
    const container = document.getElementById('exercises-container');
    container.innerHTML = '';

    for (let i = 1; i <= numExercises; i++) {
        const section = document.createElement('section');
        section.className = 'baseplate';

        section.innerHTML = `
            <section class="name-of-excersice">
                <input id="Name" type="text" name="excersice" placeholder="Excersice name" maxlength="20" pattern="[a-zA-ZåäöÅÄÖ]{1,40}">
                <section class="line"></section>
            </section>
        `;

        container.appendChild(section);
    }
}

function addExercise() {
    numExercises++;
    renderExercises();
}

function removeExercise() {
    if (numExercises > 1) {
        numExercises--;
        renderExercises();
    }
}

document.addEventListener("DOMContentLoaded", renderExercises);