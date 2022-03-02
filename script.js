function toggleForm() {
    let container = document.querySelector(".main-container");
    let section = document.querySelector("section");
    container.classList.toggle("active");
    section.classList.toggle("active");
}

function checkValidation(){
    var username = document.forms["contact"]["username"].value;
    console.log(username)
}
