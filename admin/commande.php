<?php include "headerAdmin.php";
 include "../include/database.php";
 include "./RedirectAdmin.php";
 $get_Chiffre = "SELECT SUM(totalPrix) AS somme_prix_total FROM commande WHERE DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01');";
 $run_Chiffre = mysqli_query($con,$get_Chiffre);    
 ?>
 <div class="grid-form1">
    <h2 style="font-size:150%" class="forms-example"><strong>Chiffre d'affaires du mois :</strong><span style="color:black"><strong><?php 
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
    <h2 id="forms-example">Liste des Commandes</h2>
    <?php
            $get_commandes = "SELECT C.*,CL.nom,CL.prenom FROM commande C inner join client CL on  C.id_client = CL.id ORDER BY C.date DESC limit 30";
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
                <th style="text-transform:none">Action</th>
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
                
                <td>
               
                    <a class="view_data" data-toggle="modal" data-target="#exampleModal-2" href=""  style="color:#999"><i style="font-size: 150%" class="fa fa-edit" aria-hidden="true"></i>
                        Afficher</a>
                    <form style="display: inline-block;margin-top:0%;:relative;" action="gererCommande.php" method="post" onsubmit="return submitForm(this);">
                       <input type="hidden" name="id" value="<?php echo $commande['id']; ?>">
                        <button type="submit" style="color:#999;background-color:transparent;border:none;"><i
                                style="font-size: 150%" class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                    </form>
                </td>
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
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 style="display: inline-block;color:rgb(20, 219, 20);" class="modal-title" id="exampleModalLabel-2">details Commande</h4>
          <button style="display: inline-block;" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
       
           
        <div class="modal-body">
        <div class="view_commande_data">
                   
       
        </div>
        </div>
        <div class="modal-footer">
         
          <button style="border-radius:.375rem;" type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>

<script src="../sweetalert.min.js"></script>
<script type="text/javascript">
    function submitForm(form) {
    swal({
        title: "Confirmation",
        text: "Êtes-vous sûr de vouloir supprimer cette commande?", // Message de confirmation
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((isOkay) => {
        if (isOkay) {
            form.submit();
        }
    });

    return false;
}

</script>
<?php include "footerAdmin.php" ?>


<script>
    $(document).ready(function() {
    $('.view_data').click(function (e) {
        e.preventDefault();
        // console.log('hello');
       var commande_id= $(this).closest('tr').find('.commande_id').text();
       console.log(commande_id);
    $.ajax({
            method: "POST",
            url: "details_commande.php", 
            data:{
               'click_view_btn':true,
               'commande_id':commande_id,


            },
            success: function(response) {
                console.log(response);
                $('.view_commande_data').html(response);
                
        
            }
        });   
    });
});
</script>