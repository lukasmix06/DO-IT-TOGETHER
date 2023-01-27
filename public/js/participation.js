const participationButtons = document.querySelectorAll(".fa-male");

function reactToActivity() {
    const participation = this; //pod tą wartością będzie się krył element na który kliknęliśmy
    const container = participation.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    const wordsArray = participation.innerHTML.split("/");
    let nrOfParticipants = parseInt(wordsArray[0]);
    let maxNrOfParticipants = parseInt(wordsArray[1]);

    if(participation.id === "join" && nrOfParticipants < maxNrOfParticipants) {
        fetch(`/participate/${id}`)
            .then(function() {
                participation.innerHTML = (nrOfParticipants + 1) + ' / ' + maxNrOfParticipants;
                participation.id = "resign";
            })
        alert("Dołączyłeś do aktywności!");
    }
    else if(participation.id === "resign") {
        fetch(`/unparticipate/${id}`)
            .then(function() {
                participation.innerHTML = (nrOfParticipants - 1) + ' / ' + maxNrOfParticipants;
                participation.id = "join";
            })
        alert("Zrezygnowałeś z aktywności!");
    }
    else {
        participation.style.color = "red";
        alert("Brak miejsc!");
    }
}
console.log(participationButtons);
participationButtons.forEach(button => button.addEventListener("click", reactToActivity));