
<?php  

//logout.php
session_start();

if (isset($_SESSION['id']))
{
    $role= $_SESSION['role'];
    session_destroy();
    if ($role=='admin'){
        header("location:admin/login.php");
    }else {
        header("location:index.php");
    }
}







?>