<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./detailsProduit.css">
    <link rel="stylesheet" href="./styleCatalogue.css">
   
</head>

<body>

    <?php include 'include/nav.php' ?>
    <?php include 'include/utils.php' ?>
    <?php include 'connexion.php' ?>




    <?php
    $product_id = @$_GET['id']; // details.php?pro_id=xyz : get the xyz 
    $get_product = "select * from produit where urlP='$product_id'";
    $run_product = mysqli_query($con, $get_product);
    $check_product = mysqli_num_rows($run_product);
    if ($check_product == 0) {
        echo "<script> window.open('index.php','_self') </script>";
    } else {
        //gathering info about product in variables
        $row_product = mysqli_fetch_array($run_product);
        $pro_id = $row_product['id'];
        $pro_cat_id = $row_product['categorieId'];
        $pro_title = $row_product['nom'];
        $pro_price = $row_product['prix'];
        $pro_desc = $row_product['description'];
        $pro_img = $row_product['imageP'];
        $pro_url = $row_product['urlP'];
        $pro_qte = $row_product['quantite'];
        $pro_qteUnite = $row_product['Qteunite'];
        $pro_unite = $row_product['unite'];
        $pro_rate = $row_product['classement'];
        $pro_code = $row_product['code'];

        $get_p_cat = "select * from categorie where id='$pro_cat_id'";
        $run_p_cat = mysqli_query($con, $get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['nom'];
    }
    ?>


    <div class="container py-5">
        <div class="row py-5">
            <div class="col-md-6">
                <div class="card p-2">
                    <img src="./images/products/<?php echo $pro_img ?>" alt="ProductImage">
                </div>
            </div>
            <div class="col-md-6">
                <p class="product text-center">
                    <?php echo $p_cat_title ?>
                <p>
                <h2>
                    <?php echo $pro_title ?>
                </h2>
                <p>Code du produit:
                    <?php echo $pro_code ?>
                </p>

                <?php
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $pro_rate) {
                        echo '<span><i class="bi bi-star-fill"></i></span>';
                    } else {
                        echo '<span><i class="bi bi-star"></i></span>';
                    }
                }
                ?>

                <p class="price">
                    <?php echo $pro_price ?> euros
                </p>
                <p class="per1">1 x
                    <?php echo $pro_qteUnite . " " . $pro_unite ?>
                </p>
                <p><b>disponibilité:</b></p>

                <?php
                if ($pro_qte == 0) {
                    echo '<p class="rupture"><b>Rupture de stock<b></p>';
                } else if ($pro_qte < 10) {
                    echo '<p class="Peudisponible"><b>' . $pro_qte . ' restants<b></p>';
                } else {
                    echo '<p class="disponible"><b>Disponible<b></p>';
                }

                ?>

               
                    <!-- text-center buttons Starts -->
                    <?php if (isset($_SESSION['id'])) {
                      echo' <form action="" method="post" id="ajout_panier">
                      <span id="error_message"></span>
                      <div class="form-group py-5"><!-- form-group Starts -->
                          <label>Quantité </label>
                          <input name="product_qty" type="number" style="max-width:150px;" required>
                      </div>
                       <p class=" buttons">';
                       if ($pro_qte == 0)
                       {
                           echo '<button id="AddPanier" class="btn btn-primary" type="submit" name="add_cart" disabled>
                           <i class="bi bi-cart3"></i> Ajouter au panier </button>
                           <button id="Commander" class="btn btn-primary" type="submit" name="Commander" disabled>
                           Commander maintenant </button>
                           </p>
                           </form>';
                       }
                       else{
                       echo' <button id="AddPanier" class="btn btn-primary" type="submit" name="add_cart">
                        <i class="bi bi-cart3"></i> Ajouter au panier </button>
                        <button id="Commander" class="btn btn-primary" type="submit" name="Commander">
                          Commander maintenant </button>
                          </p>
                          </form>';
                       }
                      
                      
                     } else{
                                echo'<p class="rupture"><a class="rupture" id="insc" onClick="openRegister()"><b>Pour commander, vous
                                devez être un utilisateur inscrit. Cliquez ce lien pour créer un compte et commencer vos
                                achats ! <b></a></p>
                              
                            

                              ';}
                              ?>
                  
               

            </div>
        </div>
        <div class="row py-5">
            <div class="description">
                <h3>description</h3>
                <p>
                    <?php

                    echo $pro_desc ?>
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
    <?php
    
   // Commencez ou reprenez la session
    
    if( (isset($_POST['add_cart']))||(isset($_POST['Commander'])) ){
        $p_id = $pro_id;
        $product_qty = $_POST['product_qty'];

        // Vérifiez si le panier existe dans la session de l'utilisateur
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array(); // Initialisez un tableau pour le panier s'il n'existe pas encore
        }

        // Vérifiez si le produit est déjà dans le session du panier de l'utilisateur
        if (array_key_exists($p_id, $_SESSION['cart'])) {
            // Le produit est déjà dans le panier, mettez à jour la quantité par exemple
            $_SESSION['cart'][$p_id] += $product_qty;
        } else {
            // Le produit n'est pas encore dans le panier, ajoutez-le
            $_SESSION['cart'][$p_id] = $product_qty;
        }
    }
    if (isset($_POST['add_cart'])){
        echo "<script>window.open('detailsProduit.php?id='.$pro_url','_self')</script>";
    }
    if (isset($_POST['Commander'])){
        echo "<script>window.open('panier.php', '_self')</script>";
       // Commencez ou reprenez la session
    
        // Si le panier existe dans la session de l'utilisateur
       

    }
    ?>

    <?php include("include/footer.php"); ?>
    <script src="script.js"></script>
    
</body>

</html>