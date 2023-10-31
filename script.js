var btnPopup = document.getElementById("btnPopup");
var btnPopupRegister = document.getElementById("PopUpRegister");
var btnPopupRegister1 = document.getElementById("Register");
var btnPopupConnect2 = document.getElementById("reOpenConnect");
var popup = document.getElementById("wrapper"); //le popup de conx
var popupRegister = document.getElementById("wrapperRegister"); //le popup de conx
var overlay = document.getElementById("overlay");
var btnClose= document.getElementById('btnClose');
var btnClose1= document.getElementById('btnClose1');




//btnPopup.addEventListener('click', openModal);
btnClose.addEventListener('click', closeModal);
btnClose1.addEventListener('click', closeModalRegister);
btnPopupRegister.addEventListener('click', openRegister);
btnPopupConnect2.addEventListener('click', openModal);
btnPopupRegister1.addEventListener('click', openRegister);


function openModal(){
    popupRegister.style.display = 'none';
    popup.style.display = 'block';
    overlay.style.display = 'block';
    popup.style.width = '440px'
    popup.style.height = '440px'
}


function closeModalRegister(){
    overlay.style.display = 'none';
    popupRegister.style.display = 'none';
    popupRegister.style.width = '440px'
    popup.style.height = '440px'
}

function closeModal(){
    console.log('haaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
    popup.style.display = 'none';
    overlay.style.display = 'none';
    
}

function openRegister(){
    popup.style.display = 'none';
    popupRegister.style.display = 'block';
    popupRegister.style.width = '800px'
    popupRegister.style.height = '500px'
}

// Sélectionnez l'élément alert
const alertElement = document.getElementById('alert');
inputMail = document.getElementById('email');
inputPassword = document.getElementById('password');
var btnConnecter= document.getElementById('submit');
var  btnresgister= document.getElementById('btnInscription');


// Retirez la classe 'hidden' après 3000 millisecondes (3 secondes)
btnConnecter.addEventListener('click', ViderChamps());
// btnresgister.addEventListener('click', ViderChamps());

function ViderChamps(){
    inputMail.value = "";
    inputPassword.value = "";
}

setTimeout(function() {
    alertElement.style.display = 'none';
}, 2500);
