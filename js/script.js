function addPasswordEL() {
    let eyeIcons = document.querySelectorAll(".eye-icon");

    eyeIcons.forEach(element => {
        element.addEventListener("click", () => {
            let pwField = element.parentElement.querySelector("input");
            if (pwField.type == "password") {
                pwField.type = "text";
                element.classList.replace("fa-eye-slash", "fa-eye");
                return;
            }
            pwField.type = "password";
            element.classList.replace("fa-eye", "fa-eye-slash");
        });
    });
}

function toggleButtonOn(btnName) {
    document.getElementById(btnName).classList.toggle("active");
}

function confirmation() {
    answer = confirm("Do you really want to delete?");
    return answer;
}

window.addEventListener("load", addPasswordEL);