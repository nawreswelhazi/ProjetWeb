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
                    <h3>Prix</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="100" />
                    <p id="price_show" style="color:black">3 - 100</p>
                    <div id="price_range" style="color:black" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    </div>
                    <br>
                </div>		
                <div class="list-group">
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
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var category = get_filter('category');
        //var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, category:category}, //Selon le filtre du user, nous allons afficher les données
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

    $('#price_range').slider({
        range:true,
        min:0,
        max:200,
        values:[0, 200],
        step:10,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
<br><br><br><br>
<?php include "include/footer.php" ?>


</body>