<?php 
session_start();  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuyBio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Righteous&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
       
    
</head>
  <body>
 <!-- ====================================================La navbar================================================================= -->
 <?php  
 include 'include/nav.php'?>
<!-- =================================================== PopUp de conx en cas de clic =============================================== -->

   <?php include 'connexion.php'?>

<!-- ====================================================Main================================================================= -->
      <section class="main py-5">
        <div class="container py-5">
          <div class="row py-5">
            <div class="col-lg-6 py-5">
              <p class="m-0">Découvrez nos</p>
              <h1>PRODUITS ORGANIQUES</h1>
              <div class="line my-4"></div>
              <p>Notre gamme exceptionnelle de produits organiques, conçus pour répondre à vos besoins tout en préservant la planète. Chez nous, l'authenticité prime. Nous proposons une vaste sélection de produits biologiques soigneusement choisis.</p>
              <button class="mbtn1 mt-4">Read More</button>
              <button class="mbtn2">Shop now</button>
            </div>
          </div>
        </div>
      </section>

 <!-- ====================================================Main================================================================= -->
     <section class="about py-5">
      <div class="containe py-5">
        <div class="row py-5">
          <div class="col-lg-5 py-5 offset-lg-7 col-md-6 col-sm-12 col-12">
            <p class="m-0">Organic products</p>
            <h1>About organic</h1>
            <div class="line my-4"></div>
            <p>Notre histoire est ancrée dans notre passion pour la nature, la durabilité et le bien-être. Chez nous, le respect de la Terre et de ses ressources est une priorité, c'est pourquoi nous nous engageons à offrir une gamme complète de produits organiques de la plus haute qualité. </p>
            <button class="mbtn1 mt-4">Read more</button>
          </div>
        </div>
      </div>
     </section>
     
 <!-- ====================================================Welcome================================================================= -->
      <section class="welcome text-center pb-5">
        <div class="container py-4">
          <div class="row py-5 text-white">
            <div class="col-lg-6 m-auto">
              <p class="m-0">Agriculture verte</p>
              <h1>Welcome to BuyBio</h1>
              <div class="line2 my-4"></div>
              <p>Nous sommes ravis de vous accueillir dans notre oasis organique où la pureté et la qualité se rejoignent.
                Notre mission est simple: vous fournir des produits authentiques et respectueux de la planète. </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <span><i class="bi bi-tree"></i></span>
                  <h2>Pureté naturelle</h2>
                  <p>Produits fabriqués à partir d'ingrédients naturels de la plus haute qualité, sans produits chimiques ni additifs artificiels</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <span><i class="bi bi-hourglass"></i></span>
                  <h2>Durabilité Écologique</h2>
                  <p>Notre objectif est de réduire au maximum les déchets et d'utiliser des emballages respectueux de l'environnement. </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <span><i class="bi bi-clipboard-check"></i></span>
                  <h2>Qualité Inégalée</h2>
                  <p> Produits soumis à des normes strictes de contrôle de la qualité pour garantir leur efficacité et leur sécurité. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  <!-- ===================================================Our best products========================================================== -->
      <section class="product bg-light">
        <div class="container">
          <div class="row py-5 text-center">
            <div class="col-lg-6 m-auto">
              <h1>Our best products</h1>
              <div class="line my-2"></div>
              <p>Découvrez nos produits phares, soigneusement sélectionnés pour vous offrir une expérience organique exceptionnelle alliant la pureté de la nature et la qualité inégalée.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="card p-2">
                <div class="card-body">
                  <div class="star">
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                  </div>
                  <img src="./imgs/orange.jpg" class="img-fluid pb-3" alt="">
                  <h4 class="head1">Orange</h4>
                  <p class="per1">1 x 250g / 17oz</p>
                  <h4 class="head1">13 euros</h4>
                  <button class="btnc my-4">Ajouter au panier</button>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card p-2">
                <div class="card-body">
                  <div class="star">
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <img src="./imgs/papaya.jpg" class="img-fluid pb-3" alt="">
                  <h4 class="head1">Papaya</h4>
                  <p class="per1">1 x 250g / 17oz</p>
                  <h4 class="head1">13 euros</h4>
                  <button class="btnc my-4">Ajouter au panier</button>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card p-2">
                <div class="card-body">
                  <div class="star">
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <img src="./imgs/Pom.jpg" class="img-fluid pb-3" alt="">
                  <h4 class="head1">Pom</h4>
                  <p class="per1">1 x 250g / 17oz</p>
                  <h4 class="head1">13 euros</h4>
                  <button class="btnc my-4">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>


          <div class="row py-3">
            <div class="col-lg-4">
              <div class="card p-2">
                <div class="card-body">
                  <div class="star">
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                  </div>
                  <img src="./imgs/strawnb.jpg" class="img-fluid pb-3" alt="">
                  <h4 class="head1">Orange</h4>
                  <p class="per1">1 x 250g / 17oz</p>
                  <h4 class="head1">13 euros</h4>
                  <button class="btnc my-4">Ajouter au panier</button>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card p-2">
                <div class="card-body">
                  <div class="star">
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <img src="./imgs/manngo.jpg" class="img-fluid pb-3" alt="">
                  <h4 class="head1">Papaya</h4>
                  <p class="per1">1 x 250g / 17oz</p>
                  <h4 class="head1">13 euros</h4>
                  <button class="btnc my-4">Ajouter au panier</button>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card p-2">
                <div class="card-body">
                  <div class="star">
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star-fill"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <img src="./imgs/melon.jpg" class="img-fluid pb-3" alt="">
                  <h4 class="head1">Pom</h4>
                  <p class="per1">1 x 250g / 17oz</p>
                  <h4 class="head1">13 euros</h4>
                  <button class="btnc my-4">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row text-center py-5">
            <div class="col-lg-6 m-auto">
              <button class="mbtn1">Voir plus</button>
            </div>
          </div>
        </div>
      </section>

<!-- ===================================================Discount========================================================== -->
      <section class="discount py-5">
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-10 m-auto text-center">
              <h1><span class="head1"><i class="bi bi-cash-coin"></i> Coupon de réduction pour 20% :</span> PWEB01424</h1>
            </div>
            <div class="col-lg-2 m-auto">
              <button class="dbtn">Plus d'offre</button>
            </div>
          </div>
        </div>
      </section>

<!-- ===================================================Seller========================================================== -->
      <section>
        <div class="seller bg-light p">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="py-5">Nouveaux produits</h1>
              </div>
            </div>
            <div class="row g-2 py-2">
              <div class="col-lg-6">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="./imgs/lemon.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 p-5">
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star"></i></span>
                      <h5 class="head1">Citron frais</h5>
                      <p class="per1">2 x 250g / 40oz</p>
                      <h5 class="head1">14.00€</h5>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="./imgs/garlic.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 p-5">
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star"></i></span>
                      <h5 class="head1">Citron frais</h5>
                      <p class="per1">2 x 250g / 40oz</p>
                      <h5 class="head1">14.00€</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row g-2 py-2">
              <div class="col-lg-6">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="./imgs/raw-onions.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 p-5">
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star"></i></span>
                      <h5 class="head1">Citron frais</h5>
                      <p class="per1">2 x 250g / 40oz</p>
                      <h5 class="head1">14.00€</h5>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="./imgs/mint.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 p-5">
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star"></i></span>
                      <h5 class="head1">Citron frais</h5>
                      <p class="per1">2 x 250g / 40oz</p>
                      <h5 class="head1">14.00€</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row g-2 py-2">
              <div class="col-lg-6">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="./imgs/gApple.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 p-5">
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star"></i></span>
                      <h5 class="head1">Citron frais</h5>
                      <p class="per1">2 x 250g / 40oz</p>
                      <h5 class="head1">14.00€</h5>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="./imgs/chilli.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 p-5">
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star-fill"></i></span>
                      <span><i class="bi bi-star"></i></span>
                      <h5 class="head1">Citron frais</h5>
                      <p class="per1">2 x 250g / 40oz</p>
                      <h5 class="head1">14.00€</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



      <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="./imgs/logoo.png" alt="Logo de l'entreprise">
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Produits</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </footer>



      



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>