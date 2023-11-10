<?php
    session_start();
    if (!(isset($_SESSION['id'])))
    {
        header("Location:login.php");
    }elseif ($_SESSION['role']=='client')
    {
        header("Location:../index.php");
    }

    
?>