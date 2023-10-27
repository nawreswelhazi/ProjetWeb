<?php

//fetch_data.php
include('connexion.php');
if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM produit WHERE id IS NOT NULL 
	";
	
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		  AND prix BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["category"]))
	{
		$category_filter = implode("','", $_POST["category"]);
		$query .= "
		 AND categorieId IN('".$category_filter."')
		";
	}
	
	$result=mysqli_query($con,$query);
            
	$total_row = mysqli_num_rows($result);
    $output = ''; // Initialisez la variable $output en dehors de la boucle
    $count = 0; // Initialisez un compteur
	if($total_row)
	{
        while($row = mysqli_fetch_array($result))
		{
            if ($count % 3 === 0) {
                // Ouverture d'une nouvelle ligne après chaque ensemble de 3 éléments
                $output .= '<div class="row">';
            }

            $output .= '
            <div class="col-lg-4">
                <div class="card p-2">
                    <div class="card-body">
                        <div class="star">';
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $row['classement']) {
                                    $output .= '<span><i class="bi bi-star-fill"></i></span>';
                                } else {
                                    $output .= '<span><i class="bi bi-star"></i></span>';
                                }
                            }
                        $output .='</div>
                        <img src="./images/products/'.$row['imageP'].'" class="img-fluid pb-3" alt="">
                        <h4 class="head1">'.$row['nom'].'</h4>
                        <p class="per1">1 x '.$row['Qteunite'].$row['unite'].'</p>
                        <h4 class="head1">'.$row['prix'].' euros</h4>
                        <button class="btnc my-4">Ajouter au panier</button>
                    </div>
                </div>
            </div>';

            if ($count % 3 === 2) {
                // Fermeture de la ligne après chaque ensemble de 3 éléments
                $output .= '</div>';
            }

            $count++;
		}
        if ($count % 3 !== 0) {
            $output .= '</div>';
        }
	}
	else
	{
		$output = '<h3>Pas de produits trouvés</h3>';
	}
	echo $output;
}

?>