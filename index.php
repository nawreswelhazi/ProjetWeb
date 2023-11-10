
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
    <link rel="stylesheet" href="./styleCatalogue.css">
       
    
</head>
  <body>
 <!-- ====================================================La navbar================================================================= -->
 <?php  
 include 'include/nav.php'
 
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
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br/>
                    <ul class="list filter_data1"></ul> <!-- -->
                </div>
            </div>
          </div>
          
          <script>
            (function() {
            
            function filter_data1()
            {
              $('.filter_data1').html('<div id="loading" style="" ></div>');
              var action = 'fetch_data';
              $.ajax({
                  url:"BestProduct.php", //La séléction des produits se fait dans ce fichier php
                  method:"POST",
                  data:{action:action},
                  success:function(data){
                      $('.filter_data1').html(data); //En cas de succès, le code html s'ajoute la div associé pour les meilleurs produits
                  }
              });
            }


            $(document).ready(function(){

                filter_data1();
                $('.common_selector').click(function(){
                    filter_data1();
                });
            });
          })();
          </script>


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

<!-- ===================================================Nouveaux produits========================================================== -->
      <section>
        <div class="seller bg-light p">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="py-5">Nouveaux produits</h1>
              </div>
            </div>


            <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <br/>
                      <ul class="list filter_data2"></ul> <!-- -->
                  </div>
              </div>
            </div>
          
            <script>
              (function(){
              
              function filter_data2()
              {
                $('.filter_data2').html('<div id="loading" style="" ></div>');
                var action = 'NewProduct_data';
                $.ajax({
                    url:"NewProduct.php",
                    method:"POST",
                    data:{action:action}, //Selon le filtre du user, nous allons afficher les données
                    success:function(data){
                        $('.filter_data2').html(data);
                    }
                });
              }


              $(document).ready(function(){

                  filter_data2();
                  $('.common_selector').click(function(){
                      filter_data2();
                  });
              });
            })();
            </script>
          </div>
        </div>
      </section>



      <?php include "include/footer.php" ?>

      



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>