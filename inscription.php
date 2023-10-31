<link rel="stylesheet" href="./conx.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<?php 
if(isset($_POST["email"]))
{
 $connect = mysqli_connect("localhost","root","","web");;
 

 
 $nom = $_POST["nom"];
 $prenom = $_POST["prenom"];
 $password = $_POST["password"];
 $confPassword = $_POST["confPassword"];
 $email=$_POST["email"];
 $dateNaissance=$_POST["dateNaissance"];
 $user = mysqli_query($connect , "SELECT * FROM client WHERE  email='$email'");
 $output = '';
 if(empty($nom) || empty($prenom) || empty($password)||empty($email)||empty($dateNaissance)||empty($confPassword)){
    $output =  '<div id="alert" class="alert show">
    <span class="fas fa-exclamation-circle"><i class="bi bi-dash-circle-fill"></i></span>
    <span class="msg">   "Please Fill Out The Form!"  </span>';
    
 }

  
  elseif(mysqli_num_rows($user) > 0){
    $output ='<div id="alert" class="alert show">
    <span class="fas fa-exclamation-circle"><i class="bi bi-dash-circle-fill"></i></span>
    <span class="msg">   client deja existe  </span>';
    
  }else{
    session_start();
    $query = "INSERT INTO client (email,password,nom,prenom,dateNaissance) VALUES('$email','$password','$nom', '$prenom','$dateNaissance')";
    $result = mysqli_query($connect, $query);

  $nouvel_utilisateur_id = mysqli_insert_id($connect);


  $output ='<div id="success" class="success show">
  <span class="fas fa-exclamation-circle"><i class="bi bi-dash-circle-fill"></i></span>
    <span class="msg">Inscription réussi </span>';
    $output .= '<script>closeModalRegister();</script>';
    $_SESSION["id"] = $nouvel_utilisateur_id;
}
}
echo $output; 
  ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">