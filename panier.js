var clickedButton = ""; // Variable pour stocker le bouton cliqué

function setClickedButton(buttonValue) {
    clickedButton = buttonValue; // Enregistrez la valeur du bouton cliqué
}

function getConfirmationMessage() {
    // Déterminez le message de confirmation en fonction du bouton cliqué
    switch (clickedButton) {
        case 'vider':
            return "Êtes-vous sûr de vider le panier ?";
        case 'update':
            return "Êtes-vous sûr de mettre à jour le panier ?";
        case 'commande':
            return "Êtes-vous sûr de commander ces articles ?";
        default:
            return "Êtes-vous sûr ?";
    }
}

function submitForm(form) {
    swal({
        title: "Confirmation",
        text: getConfirmationMessage(), // Obtenez le message de confirmation personnalisé
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((isOkay) => {
        if (isOkay) {
            // Assignez la valeur du bouton cliqué à un champ caché dans le formulaire
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'action'; // Nom du champ
            input.value = clickedButton; // Valeur du bouton cliqué
            form.appendChild(input);

            form.submit();
        }
    });

    return false;
}