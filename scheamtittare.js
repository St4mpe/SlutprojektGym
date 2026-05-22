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

async function completeWorkout(){
    const allCheckbox = document.querySelectorAll('input[type="checkbox"]');
    const nameOfSchedule = document.getElementById("scheeduleName");
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

    const response = await fetch('save_workout_stat.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({procent: procentage, name: nameOfSchedule.textContent})
    });

    //1. For each .name-of-excerise för att få ut alla 
    //2. Sen For each input[type="checkbox"] för att kolla hur många avklarade sets
    //3. Göra en json-fil där övningen står först och sen avklarade sets

    //4. Kolla ifall övningen redan finns med rätt linked user annars skapa en ny rad för varje övning
    //5. Ifall den redan finns ska den ta det gamla antelet sets och plussa med det nya
    //6. Lägga in det in tabellen completedexcersices där det länkas till ett userid
    
    const schema = document.querySelectorAll('.baseplate');
    const excersiceData = {
        exercise: []
    };

    schema.forEach((ex) => {
        const exToJSON = ex.querySelector('.name-of-excersice');

        const sets = ex.querySelectorAll('input[type="checkbox"]');
        let numSets = 0;
        sets.forEach((set) => {
            if (set.checked){
                numSets++;
            }
        })

        excersiceData.exercise.push({exerciseName: exToJSON.textContent, sets: numSets});
    })
    
    for (const e of excersiceData.exercise) {
        const specifikExcercise = e.exerciseName;
        const sets = e.sets;

        const responseExName = await fetch('excerciseCheck.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: specifikExcercise })
        });

        const result = JSON.stringify(await responseExName.json());
        if (result == "false")
        {
            const responseExName = await fetch('excerciseNewStat.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ name: specifikExcercise, sets: sets})
            });
        }
        else if (result == "true")
        {
            console.log("insert");
        }
    }
}