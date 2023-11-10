<?php
   
    if ((isset($_SESSION['id'])))
    {
        if($_SESSION['role']=='admin')
        header("Location:admin/dashboard.php");
    }
?>