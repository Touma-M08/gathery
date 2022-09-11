if(window.innerWidth < 1160) {
    const age = document.getElementsByClassName("age-num");
    for(let i = 0; i <= 8; i++) {
        age[i].name = "";
    }
}else {
    const age = document.getElementById("age-select");
    age.name = "";
}

