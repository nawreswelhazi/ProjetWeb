<?php
   $con = mysqli_connect("localhost","root","","web");
   
   $mdp = $_POST['mdpNouv'];
   $id = $_POST['id'];

   $result=mysqli_query($con, "UPDATE `client` SET `password`='$mdp' WHERE id='$id'");
   if($result){
    return 'data updated';

   }
?>