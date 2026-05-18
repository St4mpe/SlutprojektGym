document.addEventListener("DOMContentLoaded", function() {
    avrageCompletion();
});

function avrageCompletion()
{
    let totalnumber = 0;
    let totalprocent = 0;
    progressData.forEach((element) => {
        let number = parseInt(element);
        totalnumber ++;
        totalprocent = totalprocent + number;
        
    });
    let avrageprocentage = totalprocent / totalnumber;
    console.log(avrageprocentage)
}