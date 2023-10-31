<?php 
session_start();  ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Righteous&display=swap" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="styleNavbar.css">



<nav class="navbar navbar-expand-lg  pb-3">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="./imgs/logo.png" class="img-fluid" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Aliments
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Legumes.php">Légumes</a></li>
                  <li><a class="dropdown-item" href="Fruits.php">Fruits</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Fromage.php">Fromages</a></li>
                  <li><a class="dropdown-item" href="Charcuterie.php">Charcuterie</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Liquides
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Huile.php">Huile</a></li>
                  <li><a class="dropdown-item" href="Vinaigre.php">Vinaigre</a></li>
                  <li><a class="dropdown-item" href="Boissons.php">Boissons</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Energetique
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Miel.php">Miel</a></li>
                <li><a class="dropdown-item" href="Confiture.php">Confiture</a></li>
                <li><hr class="dropdown-divider"></li>  
                <li><a class="dropdown-item" href="Autres.php">Autres</a></li>
              </ul>
            </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="catalogue.php">Catalogue</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="px-2 search " type="search" placeholder="Rechercher" aria-label="Search">
              <button class="btn1 me-3 px-3" type="submit">Rechercher</button>
            </form>
            <?php 
              
              if(isset($_SESSION["id"]))
              {
                echo '<a class="nav-link" aria-current="page" href="profil.php"><span id="btnPopup"><i class="bi bi-person-fill"></i></span></a>';
                echo "<span><i class='bi bi-basket px-3'></i></span>";
                echo  "<span> <a href='logout.php'><i  class='bi bi-box-arrow-right px-3'></i></a></span>";
              }
              else {echo '<span id="btnPopup"><i class="bi bi-person-fill"></i></span>';}  
                     
            ?> 
          </div>
        </div>
      </nav>  

      <script>
        document.addEventListener('click', function() {
        <?php
          if (isset($_SESSION["id"])==false) {
            // Si la session "name" est définie, associez un gestionnaire d'événement
            echo 'btnPopup.addEventListener("click", openModal);';
        }
        ?>
    });
</script>

