var btnPopup = document.getElementById("btnPopup");
var btnPopupRegister = document.getElementById("PopUpRegister");
var popup = document.getElementById("wrapper"); //le popup de conx
var popupRegister = document.getElementById("wrapperRegister"); //le popup de conx
var overlay = document.getElementById("overlay");
var btnClose= document.getElementById('btnClose');
var btnClose1= document.getElementById('btnClose1');




btnPopup.addEventListener('click', openModal);
btnClose.addEventListener('click', closeModal);
btnClose1.addEventListener('click', closeModalRegister)
btnPopupRegister.addEventListener('click', openRegister);

function openModal(){
    popup.style.display = 'block';
    overlay.style.display = 'block';
}


function closeModalRegister(){
    console.log(btnClose);
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
    popupRegister.style.width = '800px'
    popup.style.height = '700px'
}
