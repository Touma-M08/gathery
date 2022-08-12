//地図ホバー時のカラー変更
function getId(e) {
     return e.target.id;
}

function mouseOver(e) {
     const target = document.getElementById("map-bg");
     
     if (getId(e) == "hokkaido") {
          target.classList.add("hokkaido");
     }else if (getId(e) == "tohoku") {
          target.classList.add("tohoku");
     }else if (getId(e) == "kanto") {
          target.classList.add("kanto");
     }else if (getId(e) == "chubu") {
          target.classList.add("chubu");
     }else if (getId(e) == "kinki") {
          target.classList.add("kinki");
     }else if (getId(e) == "shikoku") {
          target.classList.add("shikoku");
     }else if (getId(e) == "chugoku") {
          target.classList.add("chugoku");
     }else if (getId(e) == "kyusyu") {
          target.classList.add("kyusyu");
     }
     
}

function mouseOut(e) {
     const target = document.getElementById("map-bg");
     
     if (getId(e) == "hokkaido") {
          target.classList.remove("hokkaido");
     }else if (getId(e) == "tohoku") {
          target.classList.remove("tohoku");
     }else if (getId(e) == "kanto") {
          target.classList.remove("kanto");
     }else if (getId(e) == "chubu") {
          target.classList.remove("chubu");
     }else if (getId(e) == "kinki") {
          target.classList.remove("kinki");
     }else if (getId(e) == "shikoku") {
          target.classList.remove("shikoku");
     }else if (getId(e) == "chugoku") {
          target.classList.remove("chugoku");
     }else if (getId(e) == "kyusyu") {
          target.classList.remove("kyusyu");
     }
}

//クリック時の県名表示
const btn = document.getElementsByClassName('btn');
console.log(btn[0]);

btn[0].addEventListener("click", function(){
　　console.log('クリックされました');
});
//const pref = document.getElementsByClassName('prefecture');
// for (var i = btn.length - 1; i >= 0; i--) {
//      btnAction(btn[i], i);
// }

// function btnAction(btnDom, btnId) {
//      btnDom.addEventListener('click', function(){
//           pref[btnId].classList.toggle('active');
//      })
     
     // for (var i = 0; i <= btn.length - 1; i++) {
     //      if (btnId !== i) {
     //           pref[btnId].classList.remove('active');
     //      }
     // }
//}