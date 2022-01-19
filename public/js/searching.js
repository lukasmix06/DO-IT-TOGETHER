const search = document.querySelector('input[placeholder="wyszukaj aktywność"]');
const activityContainer = document.querySelector(".activities");

search.addEventListener("keyup", function(event) {
    if(event.key === "Enter") {
        event.preventDefault(); //zapobieżenie wykonania się innych akcji związanych z enterem

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (activities) {
            activityContainer.innerHTML = ""; //wyczyszczenie aby domyślny widok aktywności się nie wyświetlił
            loadActivities(activities)
        });
    }
});

function loadActivities(activities) {
    activities.forEach(activity => {
        console.log(activity);
        createActivity(activity);
    });
}

function createActivity(activity) {
    const template = document.querySelector("#activity-template");

    const clone = template.content.cloneNode(true); //kolonowanie głębokie również z zagnieżdżeniami

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${activity.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = activity.title;
    const description = clone.querySelector("p");
    description.innerHTML = activity.description;
    const people = clone.querySelector(".fa-male");
    people.innerText = activity.participants;

    activityContainer.appendChild(clone); //wrzucenie zapisanych danych na stronę

}