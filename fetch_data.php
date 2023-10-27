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
	$output = '';
	if($total_row)
	{
        while($row = mysqli_fetch_array($result))
		{
			$output .= '
			<li class="list-item">
			<div class="list-content">
			<a href="'.$row['urlP'].'">
			  <img src="images/products/'. $row['imageP'] .'" alt="image of '. $row['nom'] .'" />
			</a>
			  <a align="center" href="'.$row['urlP'].'">'. $row['nom'] .'</a>
			  <h4 style="text-align:center;" class="text-danger" >'. $row['prix'] .' DT</h4>
		</div>
  			</li>
			
			';
		}
	}
	else
	{
		$output = '<h3>Pas de produits trouvés</h3>';
	}
	echo $output;
}

?>