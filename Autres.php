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
        <div class="col-md-12">
            <br/>
            <ul class="list filter_data"></ul> <!-- -->
        </div>
    </div>
</div>

<script>

    filterList = [];
    filterList.push(9);
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        //var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, category:filterList}, //Selon le filtre du user, nous allons afficher les données
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