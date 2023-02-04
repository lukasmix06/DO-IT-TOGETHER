const friendshipButtons = document.querySelectorAll(".fa-hand-sparkles");
const checkbox = document.getElementById("friends");

function makeFriend() {
    const friendshipStatus = this;
    const container = friendshipStatus.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    if(friendshipStatus.id === "add") {
        fetch(`/addFriend/${id}`)
            .then(function() {
                friendshipStatus.innerHTML = "Usun";
                friendshipStatus.id = "remove";
            })
        alert("Dodałeś użytkownika do grona znajomych!");
    }
    else if(friendshipStatus.id === "remove") {
        fetch(`/removeFriend/${id}`)
            .then(function() {
                friendshipStatus.innerHTML = "Dodaj";
                friendshipStatus.id = "add";
            })
        alert("Usunąłeś użytkownika z grona znajomych!");
    }
}

function showMyFriends() {
    friendshipButtons.forEach(friendshipButton => {
        if(friendshipButton.id === "add") {
            friendshipButton.parentElement.parentElement.parentElement.style.display = "none";
        }
    })
}

function showAllUsers() {
    friendshipButtons.forEach(friendshipButton => {
            friendshipButton.parentElement.parentElement.parentElement.style.display = "flex";
    })
}

function reactToChecking() {
    if(checkbox.checked) {
        showMyFriends();
    }
    else {
        showAllUsers();
    }
}

friendshipButtons.forEach(button => button.addEventListener("click", makeFriend));
checkbox.addEventListener("change", reactToChecking);
//--------------------------------------------------------

