<?php include "headerAdmin.php"; 
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

<div style="border-radius: .375rem" class="grid-form1">
    <h2 id="forms-example" >Gestion des categories</h2>
    <!-- Rounded switch -->
    Afficher le formulaire d'ajout d'un catalogue : 
<label class="switch">
  <input type="checkbox" onclick="afficherFormulaire()">
  <span class="slider round"></span>
</label>
    
    <form action="ajouter_Catalogue.php" method="POST" id="forms-example1" >
       
        <div  class="form-group">
            
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="nom" type="text" class="form-control1" id="nom" placeholder="Nom du nouvelle categorie" required>
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
   


    <!-- @if (count($categories)>0) -->
    <table  class="table table-hover">
        <thead>
            <tr>
              
              <th style="text-transform:none">Categorie</th>
              <th style="text-transform:none">Nbr de produits assocciés</th>
              <th style="text-transform:none;text-align:center;">Action</th>
            </tr>
        </thead>
    <tbody>
   
        <!-- @foreach($categories as $categorie) -->
        <?php
    // Connexion à la base de données (remplacez les informations de connexion par les vôtres)
    $conn = new mysqli("localhost", "root", "", "web");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour récupérer des categorie depuis la base de données
    //$sql = "SELECT * FROM categorie";
    $sql ="SELECT
    c.id AS id,
    c.nom AS nom,
    COUNT(p.categorieId) AS nombre_de_produits
FROM categorie c
LEFT JOIN produit p ON c.id = p.categorieId
GROUP by c.id" ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            ?>
             <tr id="<?php  echo $row['id']; ?>">
             <td data-target="nomcat" id="nomcat"><strong>
             <?php
            echo   $row["nom"] ;  ?>
            </strong></td>
            <td><strong>
             <?php
            echo   $row["nombre_de_produits"] ;  ?>
            </strong></td>
            <td style="text-align:center;">
            
           <!-- <form style="display:inline-block;margin-top:0%;"action="" method="post"> -->
           <button type="button" onclick="demanderConfirmationEdit(<?php echo $row['id']; ?>)"
             style="color:#999;background-color:transparent;border:none;"><i style="font-size: 150%" class="fa fa-trash-o" aria-hidden="true" ></i> Edit </button>
           
             <form  method="POST" id="formupdate<?php  echo $row['id']; ?>" style="display: none;" >
             <input style="border-radius: .375rem;width:50%;" value="<?php echo $row['nom']; ?>" placeholder="Nouveau nom" name="nomcat<?php  echo $row['id']; ?>" type="text"  id="nomcat<?php  echo $row['id']; ?>"  required>
             <button type="button" id="modifi" onclick="demanderConfirmationEdit2(<?php echo $row['id']; ?>)"  style="color:#999;background-color:transparent;border:none;"><i style="font-size: 150%" class="fa fa-check" aria-hidden="true" ></i></button>
             </form>
             
             <button type="button" id="effacerBouton" onclick="demanderConfirmation(<?php echo $row['id']; ?>)"  style="color:#999;background-color:transparent;border:none;"><i style="font-size: 150%" class="fa fa-trash-o" aria-hidden="true" ></i> Delete</button>
           <!-- </form> -->
            </td>
            <script type="text/javascript">
              //function  
              function deletedata(id){
                $(document).ready(function(){
                  $.ajax({
                    //action
                    url: 'effacer_categorie.php',
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
                        alert("catalogue supprimé");
                        document.getElementById(id).style.display="none" ;
                      }
                      else if(response ==0){
                        alert("catalogue ne peut pas être supprimé");
                      }
                    }
                  });
                }
                )
              }


              function updatedata1(id,nomcat){
                $(document).ready(function(){
                  $.ajax({
                    //action
                    url: 'Edit_catalogue.php',
                    //methode 
                    type : 'POST',
                    data : {
                      //get value
                      id : id,
                      nomcat : nomcat,
                      action : "update"
                    },
                    success : function(response){
                      // response is the out put of the action
                      if(response==1){
                        alert("catalogue modifier");
                        document.getElementById(id).style.display="none" ;
                      }
                      else if(response ==0){
                        alert("catalogue ne peut pas être modifier");
                      }
                    }
                  });
                }
                )
              }
          
        function demanderConfirmation(catalogueId) {
            // Demande une confirmation avant d'effacer le catalogue
            if (confirm("Êtes-vous sûr de vouloir effacer le catalogue ayant l'id :  " + catalogueId + " ?")) {
              deletedata(catalogueId);
            }
        }

        function demanderConfirmationEdit(catalogueId) {
          if (window.getComputedStyle(document.getElementById("formupdate"+catalogueId)).display=="none"){
           document.getElementById("formupdate"+catalogueId).style.display = "block";
          // alert(document.getElementById('nomcat').innerText);
            }

            else { document.getElementById("formupdate"+catalogueId).style.display = "none";}
        }

        function demanderConfirmationEdit2(catalogueId) {
        
            // Demande une confirmation avant d'editer le catalogue
            if (confirm("Êtes-vous sûr de vouloir éditer le catalogue ayant l'id :  " + catalogueId + " ?")) {
              let n = document.querySelector('nomcat'+catalogueId) ;
            alert(n);
           // alert(document.getElementById('nomcat'+catalogueId).innerText);
              //updatedata1(catalogueId,document.getElementById('nomcat').innerText);
            }

           
        }


        $(document).ready(function(){
          //recupération des valeurs 
          $(document).on('click','a[date-role=update]', function(){
            var id = $(this).data('id') ;
            var nomcat = $('#'+id).children('td[data-target=nomcat').text();
            $('#nomcat').val(nomcat) ; 
            $('#myModal1').modal('toggle') ;
          });
        
        
        

        //update 
        $('#save').click(function(){
          var id = $(this).data('id') ;
          $('#nomcat1').val(nomcat1) ; 
          console.log(id);
          console.log( nomcat1);
          $.ajax({
            url : 'Edit_categorie.php',
            method :  'post' , 
            action : 'update',
            data : {id : id , nom : nomcat1},
            success : function(response){
              console.log(response) ;
            }
          })
        });
      });

        </script>


<!--<script>
$(document).ready(function(){
          $(document).on('click','a[date-role=update]', function(){
            var id = $(this).data('id') ;
            alert (id); 
            var nomcat = $('#'+id).children('td[data-target=nomcat]').text();
            $('#nomcat1').val(nomcat) ; 
            $('#myModal').modal('toggle') ;
          })
        });
    </script>
   -->

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
<!-- @else  -->
<!-- <h4>pas encore de categories..</h4> -->
<!-- @endif -->
</div>



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
</style>

<?php include "footerAdmin.php" ?>