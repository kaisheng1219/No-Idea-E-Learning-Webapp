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

window.addEventListener("load", addPasswordEL);