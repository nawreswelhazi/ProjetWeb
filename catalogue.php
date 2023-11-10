<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Catalogue</title>
</head>
<body>
<?php include 'include/nav.php'?>

<?php include 'connexion.php'?>


<div class="container">
        <div class="row">
            <div class="col-md-3"> 		
                <div class="list-group">
                <br>
					<h3>Catégorie</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					<?php
                    $query = "SELECT id,nom FROM categorie";
                    $runquery=mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($runquery))
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector category" value="<?php echo $row['id']; ?>"  > <?php echo $row['nom']; ?></label>
                    </div>
                    <?php
                    }
                
                    ?>
                    </div>
                </div>	
            </div>

            <div class="col-md-9">
            	<br/>
                <ul class="list filter_data"></ul> <!-- -->
            </div>
        </div>

    </div>

<script>

    function get_filter(class_name) //fonction qui retourne la liste des catégories demandées (checked)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){ //Si la catégorie est chechée alors on l'ajoute à la liste
            filter.push($(this).val());
        });
        return filter;
    }


    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var category = get_filter('category');
        //var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, category:category}, //Selon le filtre du user, nous allons afficher les données
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }


$(document).ready(function(){

    filter_data();



    $('.common_selector').click(function(){
        filter_data();
    });


});
</script>
<br><br><br><br>
<?php include "include/footer.php" ?>


</body>