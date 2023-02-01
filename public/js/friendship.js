const friendshipButtons = document.querySelectorAll(".fa-hand-sparkles");

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
        setTimeout(function() {
            alert("Dodałeś użytkownika do grona znajomych!");
        }, 10000);
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

friendshipButtons.forEach(button => button.addEventListener("click", makeFriend));