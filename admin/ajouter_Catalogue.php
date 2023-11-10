<?php
//header("Location: categorie.php");
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = $_POST["nom"];
 
    
    // Connexion à la base de données (remplacez les informations de connexion par les vôtres)
    $conn = new mysqli("localhost", "root", "", "web");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
 // Vérifie si le catalogue existe déjà
 $sql = "SELECT id FROM categorie WHERE nom = '$nom'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     
     $message = "Ce catalogue existe déjà. Vous ne pouvez pas l'ajouter à nouveau.";
    echo "<script>alert('" . $message . "');</script>";
 } else {
     // Le catalogue n'existe pas, on peut l'ajouter
     $insert_sql = "INSERT INTO categorie (nom) VALUES ('$nom')";
   
     if ($conn->query($insert_sql) === TRUE) {
         $message = "Catalogue ajouté avec succès.";
         echo "<script>alert('" . $message . "'); window.location.href='categorie.php';</script>";
       //  echo "<script>alert('" . $message . "');</script>"; // Redirection après 1 seconde
         
         //sleep(10); // Pause de 3 secondes
       //  header("Location: categorie.php");
     } else {
        
         echo "Erreur : " . $insert_sql . "<br>" . $conn->error;
     }
 }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>