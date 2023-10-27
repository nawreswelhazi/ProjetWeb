<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Righteous&display=swap" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


<nav class="navbar navbar-expand-lg  pb-3">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="./imgs/logo.png" class="img-fluid" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Aliments
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Légumes</a></li>
                  <li><a class="dropdown-item" href="#">Fruits</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Fromages</a></li>
                  <li><a class="dropdown-item" href="#">Charcuterie</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Liquides
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Huile</a></li>
                  <li><a class="dropdown-item" href="#">Vinaigre</a></li>
                  <li><a class="dropdown-item" href="#">Boissons</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Desserts
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Miel</a></li>
                <li><a class="dropdown-item" href="#">Confiture</a></li>
                <li><hr class="dropdown-divider"></li>  
                <li><a class="dropdown-item" href="#">Autres</a></li>
              </ul>
            </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">About</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="px-2 search " type="search" placeholder="Search" aria-label="Search">
              <button class="btn1 me-3 px-3" type="submit">Search</button>
             
                  <span id="btnPopup"><i class="bi bi-person-fill"></i></span>
            
             
               
                  
             <?php 
              
              if(isset($_SESSION["name"]))
              {   
                   
                  echo "<span><i class='bi bi-basket px-3'></i></span>";
                    echo  "<span> <a href='logout.php'><i  class='bi bi-box-arrow-right px-3'></i></a></span>";
                }  
               
                ?>  
            </form>
          </div>
        </div>
      </nav>
