//Vérifier que le mot de passe est valide
var btnInscription= document.getElementById('btnInscription');
var validity= document.getElementById('validity');
var strength=document.getElementById('strength'); 
var pass = document.getElementById("PasswordProposed");

function validate() { 
    var str = pass.value; 
    if (str.length > 0)
    {
        validity.style.display="block";
        if (str.match( /[0-9]/g) && 
            str.match( /[A-Z]/g) && 
            str.match(/[a-z]/g) && 
            str.match( /[^a-zA-Z\d]/g) &&
            str.length >= 10) 
        {
            strength.innerHTML="valide";
            strength.style.color="rgb(37, 246, 18)";
        }
        else {
            strength.innerHTML="non valide";
            strength.style.color="rgb(255, 0, 0)";
            btnInscription.disabled=true;
        }
    }
    else 
    {
        validity.style.display="none";
        btnInscription.disabled=true;
    }
} 

//Vérifier le mot de passe 2
var pass2 = document.getElementById("PasswordProposed2");
var validity2= document.getElementById('validity2');
var strength2=document.getElementById('strength2'); 

function confirm() { 
    var str = pass2.value; 
    if (str.length > 0)
    {
        validity2.style.display="block";
        if (str === pass.value) 
        {
            strength2.innerHTML="conforme";
            strength2.style.color="rgb(37, 246, 18)";
        }
        else {
            strength2.innerHTML="non conforme";
            strength2.style.color="rgb(255, 0, 0)";
            btnInscription.disabled=true;
        }
    }
    else 
    {
        validity2.style.display="none";
        btnInscription.disabled=true;
    }
} 

//Activer le bouton si toutes les conditions sont satisfaites
function activateButton() { 
    if (strength2.innerHTML === "conforme" && strength.innerHTML === "valide")
    {
        console.log("aaa");
        btnInscription.disabled=false;
    } else {
        console.log("testtt");
        btnInscription.disabled=true;
    }
} 

pass.addEventListener('input', () => {validate(); activateButton();});
pass2.addEventListener('input', () => {confirm(); activateButton();});




