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
    echo 3;
  $result = $statement->fetchAll();

  foreach($result as $row)
  {
    echo $row["password"];
    echo $_POST["password"];
    echo $_POST["password"]==$row["password"];

   if($_POST["password"]==$row["password"])
   {
    echo 4;
    $_SESSION["name"] = $row["prenom"];
   }
   else
   {
    echo 5;
    $output = '<label class="text-danger">Wrong Password</label>';
   }
  }
 }
 else
 {
    echo 6;
  $output = '<label class="text-danger">Wrong Email Address</label>';
 }

 echo $output;
}

?>



