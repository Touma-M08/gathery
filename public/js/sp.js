const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('nav');

function toggle() {
    hamburger.classList.toggle('active');
    nav.classList.toggle('active');
}



//ホバー解除
if (window.innerWidth < 1160) {
    try { 
        for (var si in document.styleSheets) {
            var styleSheet = document.styleSheets[si];
            if (!styleSheet.rules) continue;
 
            for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
                if (!styleSheet.rules[ri].selectorText) continue;
 
                if (styleSheet.rules[ri].selectorText.match(':hover')) {
                    styleSheet.deleteRule(ri);
                }
            }
        }
    } catch (ex) {}
}