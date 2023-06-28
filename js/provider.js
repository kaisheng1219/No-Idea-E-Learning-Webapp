function toggleButtonOn(btnName) {
    document.getElementById(btnName).classList.toggle("active");
}

function confirmation(){
    answer = confirm("Do you really want to delete the course?");
    return answer;
}