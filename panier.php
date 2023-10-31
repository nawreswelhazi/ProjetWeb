<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panier</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet"  -->
    <!-- href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" /> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  -->
    <link rel="stylesheet" href="./detailsProduit.css">
    <link rel="stylesheet" href="./styleCatalogue.css">
    <link rel="stylesheet" href="./panier.css">

</head>

<body>
    <?php include 'include/database.php' ?>
    <?php include 'include/nav.php' ?>
    <?php include 'include/utils.php' ?>
    <?php include 'connexion.php' ?>

    <div id="content">
        <div class="container">

            <div id="cart">
                <div class="box">
                    <form action="panier.php" method="post" enctype="multipart-form-data"><!-- form Starts -->
                        <h1> Panier </h1>
                        <?php

                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            // Le panier existe et n'est pas vide
                            $nombre_de_produits = count($_SESSION['cart']);

                            echo ' <p class="text-muted" >Le panier contient ' . $nombre_de_produits . ' produits.</p>';
                        } else {
                            // Le panier est vide
                            echo '<p class="text-muted" >Le panier est vide.';
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th colspan="1">Supprimer</th>
                                        <th colspan="2"> Sous Total </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {


                                        foreach ($_SESSION['cart'] as $product_id => $quantity) {

                                            $get_products = "select * from produit where id='$product_id '";
                                            $run_products = mysqli_query($con, $get_products);
                                            while ($row_products = mysqli_fetch_array($run_products)) {
                                                $product_title = $row_products['nom'];
                                                $product_img = $row_products['imageP'];
                                                $only_price = $row_products['prix'];
                                                $urlP = $row_products['urlP'];
                                                $sub_total = $only_price * $quantity;
                                                $total += $sub_total;

                                            }

                                            ?>

                                            <tr>
                                                <td><img style="width: 40px;" src="images/products/<?php echo $product_img; ?>">
                                                </td>
                                                <td>
                                                    <a href="detailsProduit.php?id=<?php echo $urlP ?>">
                                                        <?php echo $product_title; ?>
                                                    </a>
                                                </td>
                                                <td><input type="number" name="quantity[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>"
                                                         class="quantity form-control">
                                                </td>


                                                <td>
                                                    <?php echo $only_price; ?> euro
                                                </td>
                                                <td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>">
                                                </td>
                                                <td>
                                                    <?php echo $sub_total; ?>euro
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5"> Total </th>
                                        <th colspan="2">
                                            <?php echo $total; ?> euro
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                echo ' <div class="box-footer">
                            
                                <div class="pull-right">
                                <button id="vider_button_panier"class="btn btn-info" type="submit" name="vider" value="vider Cart">
                                    
                                      vider panier
                                    </button>
                                    <button id="update_button_panier"class="btn btn-info" type="submit" name="update" value="Update Cart">
                                        Mettre à jour panier
                                    </button>
                                    <a href="checkout.php" id="commande_panier" class="btn btn-info">Commander ces articles </i></a>
                                </div>

                            </div>';
                            } else {
                                echo ' <div class="box-footer">
                            
                                <div class="pull-right">
                                
                                    <a href="catalogue.php" id="commande_panier" class="btn btn-info">revenir au page catalogue</i></a>
                                </div>

                            </div>';

                            }
                            ?>
                    </form><!-- form Ends -->
                </div> <!-- box ends -->
            </div>
            <br><br><br><br><br><br><br>
            <?php
            if (isset($_POST['vider'])) {
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    unset($_SESSION['cart']); // Supprimez la variable de session du panier
                }
                echo "<script>window.open('panier.php', '_self')</script>";
            }
            
            ?>
          <?php
            if (isset($_POST['update'])) {
                // Commencez ou reprenez la session
             if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    
                    if (isset($_POST['remove']) && is_array($_POST['remove'])) {
                        foreach ($_POST['remove'] as $remove_id) {

                            // Vérifiez si le produit existe dans le panier de la session
                            if (isset($_SESSION['cart'][$remove_id])) {

                                // Supprimez le produit du panier de la session
                                unset($_SESSION['cart'][$remove_id]);

                            }
                        }
                    }
                    if ($_POST['quantity']) {
                        foreach ($_POST['quantity'] as $product_id => $new_qty) {

                            // Vérifiez si le produit existe dans le panier de la session
                            if (isset($_SESSION['cart'][$product_id])) {

                                // Mettez à jour la quantité du produit dans le panier de la session
                                $_SESSION['cart'][$product_id] = $new_qty;

                            }
                        }
                    }
                }



                // Redirigez l'utilisateur vers la page du panier après la mise à jour
                echo "<script>window.open('panier.php', '_self')</script>";
            }


            ?>

        </div><!-- container Ends -->
    </div><!-- content Ends -->


    <?php include("include/footer.php"); ?>
</body>

</html>