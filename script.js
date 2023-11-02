var btnPopup = document.getElementById("btnPopup");
var btnPopupRegister = document.getElementById("PopUpRegister");
var btnPopupConnect2 = document.getElementById("reOpenConnect");
var popup = document.getElementById("wrapper"); //le popup de conx
var popupRegister = document.getElementById("wrapperRegister"); //le popup de conx
var overlay = document.getElementById("overlay");
var btnClose= document.getElementById('btnClose');
var btnClose1= document.getElementById('btnClose1');




//btnPopup.addEventListener('click', openModal);
btnClose.addEventListener('click', function() {closeModal(); ViderChamps();});
btnClose1.addEventListener('click', function () {closeModalRegister(); ViderChampsInscri();});
btnPopupRegister.addEventListener('click', function () {openRegister(); ViderChamps();});
btnPopupConnect2.addEventListener('click', function() {openModal(); ViderChampsInscri();});


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
    popup.style.display = 'none';
    overlay.style.display = 'none';
    
}

function openRegister(){
    popup.style.display = 'none';
    popupRegister.style.display = 'block';
    overlay.style.display = 'block';
    popupRegister.style.width = '800px'
    popupRegister.style.height = '500px'
}

// Sélectionnez l'élément alert
const alertElement = document.getElementById('alert');
inputMail = document.getElementById('email');
inputPassword = document.getElementById('password');
var btnConnecter= document.getElementById('submit');



// Retirez la classe 'hidden' après 3000 millisecondes (3 secondes)
//btnConnecter.addEventListener('click', ViderChamps);
// btnresgister.addEventListener('click', ViderChamps());

function ViderChamps(){
    inputMail.value = "";
    inputPassword.value = "";
}


inputnom = document.getElementById('nom');
inputPrenom = document.getElementById('prenom');
inputBirthday = document.getElementById('birthday');
inputmail1 = document.getElementById('emailProposed');
inputPassword1 = document.getElementById('PasswordProposed');
inputPassword2 = document.getElementById('PasswordProposed2');
btnresgister= document.getElementById('btnInscription');
function ViderChampsInscri(){
    inputnom.value = "";
    inputPrenom.value = "";
    inputBirthday.value = "";
    inputmail1.value = "";
    inputPassword1.value = "";
    inputPassword2.value = "";
}

setTimeout(function() {
    alertElement.style.display = 'none';
}, 2500);
