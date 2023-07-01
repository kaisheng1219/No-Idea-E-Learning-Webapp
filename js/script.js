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

function checkboxValidation() {
    checkboxes = document.querySelectorAll('input[type="checkbox"]');
    if (Array.from(checkboxes).some(checkbox => checkbox.checked))
        return true;
    else {
        alert("Please select at least one instructor.");
        return false;
    }
}

function confirmation() {
    answer = confirm("Do you really want to delete?");
    return answer;
}

window.addEventListener("load", addPasswordEL);