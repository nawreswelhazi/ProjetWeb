<?php
// Incluez votre fichier de connexion à la base de données ici
require_once 'include/database.php';

// Récupérez l'ID de la commande depuis la requête GET
if (isset($_POST['click_view_btn'])) {
    $id=$_POST['commande_id'];
    // echo $id;
    $get_products = "SELECT L.*,p.nom,p.prix FROM lignecommande L   inner join produit p on L.id_produit =p.id WHERE L.id_commande =$id";
     $get_commande="SELECT c.totalPrix,c.date,cl.nom,cl.prenom,cl.email FROM commande c  inner join client cl on c.id_client =cl.id WHERE c.id =$id";
     $run_commande = mysqli_query($con, $get_commande);
    $run_products = mysqli_query($con, $get_products);
    $count = mysqli_num_rows($run_products);
    while ($commande = mysqli_fetch_array($run_commande)) {
        $cm=$commande['totalPrix'];
        echo' <table class="table table-striped table-hover" >
        <tr >
            <th>produit</th>
            <th >quantité</th>
            <th>prix unitaire</th>
            <th colspan="2">total</th>
        </tr>';
        
    
    
        
   
    }

   if($count>0){
    while ($product = mysqli_fetch_array($run_products)) {
        echo'
       
        <tr class="td"><td>'.$product['nom'].'</td><td>'.$product['quantite'].'</td><td>'.$product['prix'].'€</td><td class="total" colspan="2"><strong> '.$product['totalprix'].' €</strong></td></tr>
        ';
   }
   
   
  echo 
 ' <tr><td></td><td></td><td></td><td class="total"><strong>TOTAL</strong></td><td class="total"><strong>'.$cm.'€</strong></td></tr>
  </table>';
   
    
   }else{
    echo'<h4> no record found</h4>';
   }
}
?>

