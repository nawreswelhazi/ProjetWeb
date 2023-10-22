var btnPopup = document.getElementById("btnPopup");
var overlay = document.getElementById("wrapper"); //le popup de conx
var body = document.body;
//var btnClose= document.getElementById('btnClose');

btnPopup.addEventListener('click', openModal);

function openModal(){
    overlay.style.display = 'block';
    body.style.filter = "brightness(50%)";
}