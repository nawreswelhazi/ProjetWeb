<?php
include 'include/database.php' ;
session_start();
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'vider': // Code pour vider le panier
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                unset($_SESSION['cart']); // Supprimez la variable de session du panier
            }
            echo "<script>window.open('panier.php', '_self')</script>";
           
            break;
        case 'update':// Code pour mettre à jour le panier
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    
                if (isset($_POST['remove']) && is_array($_POST['remove'])) {
                    foreach ($_POST['remove'] as $remove_id) {

                        // Vérifiez si le produit existe dans le panier de la session
                        if (isset($_SESSION['cart'][$remove_id])) {

                            // Supprimez le produit du panier de la session
                            unset($_SESSION['cart'][$remove_id]);

                        }
                    }
                }
                if ($_POST['quantity']) {
                    foreach ($_POST['quantity'] as $product_id => $new_qty) {

                        // Vérifiez si le produit existe dans le panier de la session
                        if (isset($_SESSION['cart'][$product_id])) {

                            // Mettez à jour la quantité du produit dans le panier de la session
                            $_SESSION['cart'][$product_id] = $new_qty;

                        }
                    }
                }
            }



            // Redirigez l'utilisateur vers la page du panier après la mise à jour
            echo "<script>window.open('panier.php', '_self')</script>";
        
            
            break;
        case 'commande':
            var_dump($_POST);
            $id_utilisateur = $_SESSION['id']; // Remplacez par l'ID de l'utilisateur connecté

            // Récupérez le prix total de la commande
            $prix_total_commande = $_POST['total'];
    
            // Insérez la commande dans la table "commande"
            $insert_commande = "INSERT INTO commande (id_client, totalPrix) VALUES ('$id_utilisateur', '$prix_total_commande')";
            $run_commande = mysqli_query($con, $insert_commande);
            $id_commande = mysqli_insert_id($con); // Récupérez l'ID de la commande insérée
    
            if ($id_commande) {
                // Parcourez les produits du panier
                foreach ($_POST['quantity'] as $product_id => $quantity) {
                    $total_prix = $_POST['total_prix'][$product_id];
    
                    // Insérez chaque produit dans la table "ligne_commande"
                    $insert_ligne_commande = "INSERT INTO lignecommande (id_commande, id_produit, quantite, totalprix) VALUES ('$id_commande', '$product_id', '$quantity', '$total_prix')";
                    $run_ligne_commande = mysqli_query($con, $insert_ligne_commande);
    
                    // Vous pouvez également mettre à jour le stock des produits dans la table "produit" à ce stade si nécessaire.
                }
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    unset($_SESSION['cart']); // Supprimez la variable de session du panier
                }
               
              echo "<script>window.open('profil.php#account-info', '_self')</script>";
        } else {
            // Gestion de l'erreur d'insertion de la commande
            echo "Erreur lors de l'insertion de la commande.";
        }

            // Code pour passer une commande
            
            break;
        default:
            // Traitement par défaut en cas de valeur inconnue
            echo "<script>window.open('panier.php', '_self')</script>";
    }
}

 ?>