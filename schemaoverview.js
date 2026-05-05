let numExercises = 1;

function createExercise(i) {
    const section = document.createElement('section');
    section.className = 'baseplate';

    section.innerHTML = `
        <section class="name-of-excersice">
            <input class="name" type="text" name="excersice" placeholder="Excersice name" maxlength="20" pattern="[a-zA-ZåäöÅÄÖ]{1,40}">
            <section class="line"></section>
        </section>
    `;

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