<?php
   $con = mysqli_connect("localhost","root","","web");
   
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $mail = $_POST['mail'];
   $anniv = $_POST['anniversaire'];
   $num = $_POST['num'];
   $pays = $_POST['pays'];
   $image = $_POST['image'];
   $id = $_POST['id'];

   $result=mysqli_query($con, "UPDATE `client` SET `nom`='$nom', `prenom`='$prenom', `email`='$mail', `dateNaissance`='$anniv', `nrTelph`='$num', `photo`='$image', `pays`='$pays' WHERE id='$id'");
   if($result){
    return 'data updated';

   }
?>