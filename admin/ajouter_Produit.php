<?php
//header("Location: produit.php");
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = $_POST["nom"];
    $desc = $_POST["description"];
    $prix = $_POST["prix"];
    $qte = $_POST["qte"];
    $dateCr = $_POST["dateCr"];
    $img = $_POST["img"];
    $urlp = $_POST["urlp"];
    $qteu = $_POST["qteu"];
    $categorieID = $_POST["categorieID"];
    $classement = $_POST["classement"];
    $code = $_POST["code"];
    $unite= $_POST["unite"];
    // Connexion à la base de données (remplacez les informations de connexion par les vôtres)
    $conn = new mysqli("localhost", "root", "", "web");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
 // Vérifie si le produit existe déjà en vérifiant le code
 $sql = "SELECT id FROM produit WHERE code = '$code'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     
     $message = "Ce produit existe déjà. Vous ne pouvez pas l'ajouter à nouveau.";
    echo "<script>alert('" . $message . "');</script>";
 } else {
    //echo ('$nom');
     // Le produit n'existe pas, on peut l'ajouter
     $insert_sql = "INSERT INTO produit (nom, description, prix, quantite, FirstCreat , imageP, urlP, Qteunite,
      categorieId, classement, code) VALUES ('$nom', '$desc', '$prix', '$qte', '$dateCr', '$img', '$urlp', '$qteu',
       '$categorieID', '$classement', '$code')";
  $message = "produit ajouté avec succès.";
  echo "<script>alert('" . $message . "'); window.location.href='produit.php';</script>";

     if ($conn->query($insert_sql) === TRUE) {
         $message = "Produit ajouté avec succès.";
         echo "<script>alert('" . $message . "');</script>";
     } else {
        
         echo "Erreur : " . $insert_sql . "<br>" . $conn->error;
     }
 }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>