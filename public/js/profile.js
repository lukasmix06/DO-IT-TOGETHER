const editButtons = document.getElementsByClassName("edit-btn");
const submitButtons = document.getElementsByClassName("submit-btn");
const addPhotoButton = document.getElementById("initial-btn");

function changeEditBox() {
    const editBtn = this;
    const input = editBtn.previousElementSibling;
    const submitBtn = editBtn.nextElementSibling;

    editBtn.style.display = 'none';
    console.log(input);
    input.removeAttribute('readonly');
    input.style.backgroundColor = 'white';
    submitBtn.style.display = 'initial';

}

function showAlert() {
    setTimeout(function() {
            alert("Ok, zaktualizowano!");
        },
        1000
    );
}

function addPhotoBox() {
    const form = addPhotoButton.nextElementSibling;

    addPhotoButton.style.display = 'none';
    form.style.display = 'initial';
}

Array.from(editButtons).forEach(button => button.addEventListener("click", changeEditBox));
Array.from(submitButtons).forEach(button => button.addEventListener("click", showAlert));
addPhotoButton.addEventListener("click", addPhotoBox);
