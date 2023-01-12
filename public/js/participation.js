const participationButtons = document.querySelectorAll(".fa-male");

function reactToActivity() {
    const participation = this; //pod tą wartością będzie się krył element na który kliknęliśmy
    const container = participation.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    if(participation.id === "join") {
        fetch(`/participate/${id}`)
            .then(function() {
                participation.innerHTML = (parseInt(participation.innerHTML) + 1);
            })
        participation.id = "resign";
    }
    else {
        fetch(`/unparticipate/${id}`)
            .then(function() {
                participation.innerHTML = (parseInt(participation.innerHTML) - 1);
            })
        participation.id = "join";
    }
}
console.log(participationButtons);
participationButtons.forEach(button => button.addEventListener("click", reactToActivity));