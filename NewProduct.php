<link rel="stylesheet" href="./styleCatalogue.css">
<?php

//fetch_data.php
include('connexion.php');
if(isset($_POST["action"]))
{
	$query = "
    SELECT * FROM produit ORDER BY FirstCreat DESC, id ASC LIMIT 6
";
    //"SELECT * FROM produit ORDER BY classement DESC, id ASC LIMIT 6";
	
	$result=mysqli_query($con,$query);
            
	$total_row = mysqli_num_rows($result);

    
    $output = ''; // Initialisez la variable $output en dehors de la boucle
    $count = 0; // Initialisez un compteur
	if($total_row)
	{
        while($row = mysqli_fetch_array($result))
		{
            if ($count % 2 === 0) {
                // Ouverture d'une nouvelle ligne après chaque ensemble de 3 éléments
                $output .= '<div class="row g-2 py-2">';
            }

            $output .= '
                <div class="col-lg-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image-frame">
                                    <img src="./images/products/'.$row['imageP'].'" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 p-5">';
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $row['classement']) {
                                    $output .= '<span><i class="bi bi-star-fill"></i></span>';
                                } else {
                                    $output .= '<span><i class="bi bi-star"></i></span>';
                                }
                            }
                    $output .='
                                <a class="ap" href="detailsProduit.php?id='.$row['urlP'].'">
                                    <h5 class="head1">'.$row['nom'].'</h5>
                                </a>
                                <p class="per1">1 x '.$row['Qteunite'].$row['unite'].'</p>
                                <h5 class="head1">'.$row['prix'].' euros</h5>
                            </div>
                        </div>
                    </div>
                </div>';


            if ($count % 2 === 1) {
                // Fermeture de la ligne après chaque ensemble de 3 éléments
                $output .= '</div>';
            }

            $count++;
		}
	}
	else
	{
		$output = '<h3>Pas de produits trouvés</h3>';
	}
	echo $output;
}

?>