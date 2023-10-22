var btnPopup = document.getElementById("btnPopup");
var overlay = (document.getElementsByClassName("wrapper"))[0]; //le popup de conx
var btnClose= document.getElementById('btnClose');

btnPopup.addEventListener('click', openModal);

function openModal(){
    overlay.style.display = 'flex';
}