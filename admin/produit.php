<?php include "headerAdmin.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

Afficher le formulaire d'ajout d'un produit : 
<label class="switch">
  <input type="checkbox"  onclick="afficherFormulaire()">
  <span class="slider round"></span>
</label>
    
    <form action="ajouter_Produit.php" method="POST" id="forms-example1" >
       
        <div  class="form-group">
            
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="nom" type="text" class="form-control1" id="nom" placeholder="Nom du nouveau produit" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="description" type="text" class="form-control1" id="description" placeholder="Description" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="prix" type="number" class="form-control1" id="prix" placeholder="Prix" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="qte" type="number" class="form-control1" id="qte" placeholder="Quantité" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="dateCr" type="date" class="form-control1" id="dateCr" placeholder="Date de création" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="img"  type="file" accept="image/*" class="form-control1" id="img" placeholder="image" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="urlp" type="text" class="form-control1" id="urlp" placeholder="URL " required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="qteu" type="text" class="form-control1" id="qteu" placeholder="quantité unite " required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="unite" type="text" class="form-control1" id="unite" placeholder="unité" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="categorieID" type="number" class="form-control1" id="categorieID" placeholder="categorie ID" required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="classement" type="number" class="form-control1" id="classement" placeholder="classement " required>
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="code" type="text" class="form-control1" id="code" placeholder="Code " required>
            <button style="border-radius:.375rem;" type="submit" class="btn-primary btn" id="btn_ajt_cat" >Ajouter</button>
        </div>
    </form>

    <script>
      document.getElementById("forms-example1").style.display = "none";
            document.getElementById("btn_ajt_cat").style.display = "hidden";
            document.getElementById("nom").style.display = "none";
        var i = 0 ;  //affiché
        function afficherFormulaire() {
            if (i<1 ) {
            document.getElementById("forms-example1").style.display = "block";
            document.getElementById("btn_ajt_cat").style.display = "visible";
            document.getElementById("nom").style.display = "block";
            i= 1 ; 
            } else 
            {
              document.getElementById("forms-example1").style.display = "none";
            document.getElementById("btn_ajt_cat").style.display = "hidden";
            document.getElementById("nom").style.display = "none";
            
            i= 0 ;
            }
        }
    </script>
<div class="bs-docs-example grid-form1" style="border-radius: .375rem">
    <h2 id="forms-example" >Liste des Produits</h2>
    <!-- @if (count($produits)>0) -->
    <table class="table table-hover">
        <thead>
            <tr>
              
              <th style="text-transform:none">Nom Produit</th>
              <th style="text-transform:none">Categorie</th>
              <th style="text-transform:none">Réference</th>
              <th style="text-transform:none">Prix Unitaire</th>
              <th style="text-transform:none">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- @foreach($produits as $produit) -->
            <?php
    // Connexion à la base de données (remplacez les informations de connexion par les vôtres)
    $conn = new mysqli("localhost", "root", "", "web");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
//setting the start value
$start =0 ;
//setting the nbr of rows to display
$rows_per_page = 5 ; 

//nbr de page
//$records
$queryy="select * from produit" ; 
$records = $conn->query($queryy);
$pages = ceil(($records-> num_rows) / $rows_per_page )  ; 

if(isset($_GET['page-nr'])){
 $page= $_GET['page-nr'] - 1 ;
 $start = $page * $rows_per_page ; 
}

    // Requête pour récupérer des produits depuis la base de données

    $sql ="SELECT
    p.id,
    p.nom,
    p.code,
    p.prix,
    c.nom as categorie
FROM categorie c
LEFT JOIN produit p ON c.id = p.categorieId
where p.nom is not null
order by p.nom limit $start , $rows_per_page" ;
     $result = $conn->query($sql);


     if ($result->num_rows > 0) {
         echo "<ul>";
         while ($row = $result->fetch_assoc()) {
             ?>
              <tr>
              <td><strong>
              <?php
             echo   $row["nom"] ;  ?>
             </strong></td>
             <td><strong>
              <?php
             echo   $row["categorie"] ;  ?>
             </strong></td>

             <td><strong>
              <?php
             echo   $row["code"] ;  ?>
             </strong></td>
             <td><strong>
              <?php
             echo   $row["prix"] ;  ?>
             </strong></td>
              <td>
                <a href="" style="color:#999"><i style="font-size: 150%"  class="fa fa-edit" aria-hidden="true" ></i> Edit</a>
               <!-- <form style="display: inline-block;margin-top:0%;:relative;"action="" method="post"> -->
                    
                  <button type="button" id="effacerBouton" onclick="demanderConfirmation(<?php echo $row['id']; ?>)" style="color:#999;background-color:transparent;border:none;"><i style="font-size: 150%" class="fa fa-trash-o" aria-hidden="true" ></i> Delete</button>
               <!-- </form> -->
                </td>

                
            <?php
        }
        echo "</ul>";
    } else {
        echo "Aucun produit trouvé.";
    }  ?>
            </tr>
            <!-- @endforeach -->
            
        </tbody>
    </table>

    <script type="text/javascript">
              //function 
              function deletedata(id){
                $(document).ready(function(){
                  $.ajax({
                    //action
                    url: 'effacer_produit.php',
                    //methode 
                    type : 'POST',
                    data : {
                      //get value
                      id : id,
                      action : "delete"
                    },
                    success : function(response){
                      // response is the out put of the action
                      if(response==1){
                        alert("produit supprimé");
                        document.getElementById(id).style.display="none" ;
                      }
                      else if(response ==0){
                        alert("produit ne peut pas être supprimé");
                      }
                    }
                  });
                }
                )
              } 
        function demanderConfirmation(produitId) {
            // Demande une confirmation avant d'effacer le produit
            if (confirm("Êtes-vous sûr de vouloir effacer le produit ayant l'id :  " + produitId + " ?")) {
              deletedata(produitId);
            }
        }
    </script>
    <!-- @else -->
    <!-- <h4>pas encore de produits..</h4> -->
    <!-- @endif -->
</div>

<!-- @endsection -->
<style>
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

 
a{
   display: inline-block;
   text-decoration: none;
   color: #006cb3;
   padding: 10px 20px;
   border: thin solid #d4d4d4;
   transition: all 0.3s;
   font-size: 18px;
}
 
a.active{
   background-color: #0d81cd;
   color: #fff;
}
.page-info{
   margin-top: 90px;
   font-size: 18px;
   font-weight: bold;
}
 
.pagination{
   margin-top: 20px;
}
.content p{
   margin-bottom: 15px;
}
.page-numbers{
   display: inline-block;
}
</style>


<!--- displaying the page info-->
<div class="page-info">
  showing 1 of <?php echo $pages ?>
</div>
<!--- displaying the pagination buttons-->
<div class="pagination">


  <div class="page-numbers">
    <?php
      for ($counter = 1 ; $counter <= $pages ; $counter++){
        ?>
<a href="?page-nr=<?php echo $counter ?>"> <?php echo $counter ?> </a>
        <?php
      }
    ?>
 
  </div>

  
</div>

<?php include "footerAdmin.php" ?>