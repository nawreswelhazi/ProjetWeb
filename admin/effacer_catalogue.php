<?php

$conn = new mysqli("localhost", "root", "", "web");
if(isset($_POST["action"])){
    //choose a fct depends on value of $_Post["action"]
    if($_POST["action"] == "delete") {
        delete() ;
    }
}

function delete(){
    global $conn ; 
    $id = $_POST["id"] ;
    $row = mysqli_fetch_assoc(mysqli_query($conn,"select * from categorie where id = $id")) ;
    mysqli_query($conn,"delete from categorie where id = $id") ; 
    echo 1 ; 
}

?>