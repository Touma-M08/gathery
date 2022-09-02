const element = document.getElementById('check-box');
const time = document.getElementById('time');

function boxClick() {
    if (element.checked) {
        time.disabled = true;
        time.value = "00:00";
        
    } else {
        time.disabled = false;
        
    }
}

const today = new Date();
//今日の日付取得
const year = today.getFullYear();
let month = today.getMonth()+1;

if (month.toString().length == 1) {
    month = '0' + month;
}

let day = today.getDate();

if (day.toString().length == 1) {
    day = '0' + day;
}

const minDay = year + '-' + month + '-' + day;

document.getElementById('date').min = minDay;


const register = document.getElementById('register');
const btnText = document.getElementById('toggle-btn');

function toggle() {
    register.classList.toggle('show');
    
    if (btnText.innerHTML == "予定を登録する") {
        btnText.innerHTML = "閉じる";
    } else {
        btnText.innerHTML = "予定を登録する";
    };
}