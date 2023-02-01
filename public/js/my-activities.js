const checkbox = document.getElementById("my-activities");
//const activityContainer = document.querySelector(".activities");
const myActivityMarkers = activityContainer.querySelectorAll(".fa-male");

function showMyActivities() {
    myActivityMarkers.forEach(myActivityMarker => {
        if(myActivityMarker.id === "join") {
            myActivityMarker.parentElement.parentElement.parentElement.style.display = "none";
        }
    })
}

function showAllActivities() {
    myActivityMarkers.forEach(myActivityMarker => {
        let DisplayModeOfElement = myActivityMarker.parentElement.parentElement.parentElement.style.display;
        if(DisplayModeOfElement === "none") {
            myActivityMarker.parentElement.parentElement.parentElement.style.display = "flex";
        }
    })
}

function reactToChecking() {
    if(checkbox.checked) {
        showMyActivities();
    }
    else {
        showAllActivities();
    }
}

checkbox.addEventListener("change", reactToChecking);