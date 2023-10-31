<link rel="stylesheet" href="./conx.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<?php 
if(isset($_POST["email"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=web", "root", "");

 session_start();

 $query = "SELECT * FROM client WHERE email = '".$_POST['email']."'";

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
    $_SESSION["name"] = $row["prenom"];
    $_SESSION["id"] = $row["id"];
    $output = '<h1>Succes</h1>';
    
   }
   else
   {
   
    $output = '
    <div id="alert" class="alert show">
      <span class="fas fa-exclamation-circle"><i class="bi bi-dash-circle-fill"></i></span>
      <span class="msg">   Mot de passe incorrect  </span>
      </div>';
   }
  }
 }
 else
 {
    
  $output = '
  <div id="alert" class="alert show">
    <span class="fas fa-exclamation-circle"><i class="bi bi-dash-circle-fill"></i></span>
    <span class="msg">    Ce mail n`existe pas   </span>
    </div>';
 }

 echo $output;
}

?>

<script src="script.js"></script>



