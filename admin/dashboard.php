
<?php include "headerAdmin.php";
 include "../include/database.php";
 include "./RedirectAdmin.php";
 $get_Chiffre = "SELECT SUM(totalPrix) AS somme_prix_total FROM commande WHERE DATE(date) = CURDATE();";
 $run_Chiffre = mysqli_query($con,$get_Chiffre);    
 ?>
 <div class="grid-form1">
	
    <h2 style="font-size:150%" class="forms-example"><strong> l'argent encaissé aujourd'hui :</strong><span style="color:black"><strong><?php 
    while ($Chiffre = mysqli_fetch_array($run_Chiffre)) {
        if($Chiffre['somme_prix_total']>0){
       echo ' '.$Chiffre['somme_prix_total'].' €';
        }else{
            echo ' 0 €'; 
        }
     }
            ?></strong></span></h2>
</div>
<div class="bs-docs-example grid-form1" style="border-radius: .375rem">

<div class="card-header">
    <h3 style="display:inline-block;"><strong>Liste des Commandes d'aujourd'hui:</strong></h3> <a href="commande.php"><button style="border-radius:.375rem;float:right;margin-top:0px;text-transform:none;" type="submit" class="btn-primary btn">
	voir toutes les commandes</button></a>
</div>
    <?php
            $get_commandes = "SELECT C.*,CL.nom,CL.prenom FROM commande C inner join client CL on  C.id_client = CL.id WHERE DATE(date) = CURDATE() ORDER BY C.date DESC limit 30";
            $run_commandes = mysqli_query($con, $get_commandes);
            $count = mysqli_num_rows($run_commandes);
            if($count>0){
                ?>
        
    <table class="table table-hover">
        <thead>
            <tr>

                <th style="text-transform:none"> Client</th>
                <th style="text-transform:none">Date</th>
                <th style="text-transform:none">Prix Total</th>
                
            </tr>
        </thead>
        <tbody>
            
            <?php
            while ($commande = mysqli_fetch_array($run_commandes)) {
            ?>
           
            <tr>
                <td class="commande_id" style="display:none;"> <?php echo $commande['id'] ?></td>
                <td><strong><?php echo $commande['nom'].' ' . $commande['prenom']; ?></strong></td>
                <td><?php echo $commande['date'] ?></td>
                <td><?php echo $commande['totalPrix'] ?> € </td>
                
            </tr>
            <?php
                                        }
                                        ?>
           

        </tbody>
    </table>
    <?php } else { ?>
   
    <h4>pas encore de commandes..</h4>
    <?php
    }
    ?>
   
</div>

<?php include "footerAdmin.php" ?>


