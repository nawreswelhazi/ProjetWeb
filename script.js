var btnPopup = document.getElementById("btnPopup");
var popup = (document.getElementsByClassName("wrapper"))[0]; //le popup de conx
var overlay = document.getElementById("overlay");
var btnClose= document.getElementById('btnClose');

btnPopup.addEventListener('click', openModal);

function openModal(){
    popup.style.display = 'block';
    overlay.style.display = 'block';
}