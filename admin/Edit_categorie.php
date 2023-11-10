<?php

$conn = new mysqli("localhost", "root", "", "web");
if(isset($_POST["action"])){
    //choose a fct depends on value of $_Post["action"]
    if($_POST["action"] == "update") {
        update() ;
    }
}

function update(){
    global $conn ; 
    $id = $_POST["id"] ;
    $nomcat = $_POST["nomcat"] ;
    echo $nomcat ;
    $row = mysqli_fetch_assoc(mysqli_query($conn,"select * from categorie where id = $id")) ;
   $res =  mysqli_query($conn,"update categorie set nom= '$nomcat' where id = $id") ; 
    if($res){
        return 'data updated' ;
    }
}

?>