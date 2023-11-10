<?php
    require_once '../include/database.php';
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sqlState = $connect->prepare('DELETE FROM commande WHERE id=?');
        $supprime = $sqlState->execute([$id]);
    }
    
    header('location: commande.php');
    
    ?>