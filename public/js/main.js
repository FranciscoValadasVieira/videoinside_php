
//Menu déroulant
const btnMobile = document.getElementById('btn_mobile');
function dropMenu() {
   const nav = document.getElementById('nav');
   nav.classList.toggle('active');
}
btnMobile.addEventListener('click', dropMenu);