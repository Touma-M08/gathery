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
const day = today.getDate();

const minDay = year + '-' + month + '-' + day;

console.log(minDay);
document.getElementById('date').min = minDay;


const register = document.getElementById('register');

function toggle() {
    register.classList.toggle('show');
}