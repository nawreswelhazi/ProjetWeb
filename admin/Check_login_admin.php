<?php 

if(isset($_POST["email"]))
{
 include("../include/database.php");
 
 session_start();

 $query = "SELECT * FROM gerant WHERE email = '".$_POST['email']."'";

 $statement = $connect->prepare($query);

 $statement->execute();

 $total_row = $statement->rowCount();

 $output = '';

 if($total_row > 0)
 {
    
  $result = $statement->fetchAll();

  foreach($result as $row)
  {
    
    

   if($_POST["password"]==$row["password"])
   {
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["nom"];
    $_SESSION["role"]='admin';
   
   
    
   }
   else
   {
   
    $output = '
    <div class="alert alert-danger"> Mot de passe incorrect</div>';
   }
  }
 }
 else
 {
    
  $output = '<div class="alert alert-danger"> Ce mail n`existe pas</div>';
 }

 echo $output;
}

?>