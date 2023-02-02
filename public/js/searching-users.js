const search = document.querySelector(".search-bar").firstElementChild;
const userContainer = document.querySelector(".users");

search.addEventListener("keyup", function(event) {
    const search_data = this.value.toLowerCase();
    userContainer.querySelectorAll(".user-box").forEach(user => {
        let name_surname = user.querySelector(".name-surname").innerHTML.toLowerCase();
        let description = user.querySelector(".description").innerHTML.toLowerCase();
        if(name_surname.includes(search_data) || description.includes(search_data)) {
            user.style.display = "flex";
        }
        else {
            user.style.display = "none";
        }
    })
})