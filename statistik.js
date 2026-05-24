document.addEventListener("DOMContentLoaded", function() {
    avrageCompletion();
});

function avrageCompletion()
{
    let totalnumber = 0;
    let totalprocent = 0;
    if (progressData == 0)
    {
        const i = document.getElementById("avg-fill");
        document.documentElement.style.setProperty('--progressfill', "0%");
        i.innerHTML="0%";   
    }
    else
    {
        progressData.forEach((element) => {
        let number = parseInt(element);
        totalnumber ++;
        totalprocent = totalprocent + number;
        
        });
        let avrageprocentage = Math.round(totalprocent / totalnumber);
        document.documentElement.style.setProperty('--progressfill', avrageprocentage+"%");
        const i = document.getElementById("avg-fill");
        i.innerHTML= avrageprocentage.toString() + "%";
    }
}