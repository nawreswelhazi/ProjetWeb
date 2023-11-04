<?php include "headerAdmin.php" ?>


<div style="border-radius: .375rem" class="grid-form1">
    <h2 id="forms-example" >Gestion des categories</h2>
    <form action="" method="POST">
       
        <div  class="form-group">
            
            <input style="border-radius: .375rem;width:89%;display:inline-block;" name="nom" type="text" class="form-control1" id="nom" placeholder="Nom du nouvelle categorie" required>
            <button style="border-radius:.375rem;" type="submit" class="btn-primary btn">Ajouter</button>
        </div>
    </form>
    <!-- @if (count($categories)>0) -->
    <table  class="table table-hover">
        <thead>
            <tr>
              
              <th style="text-transform:none">Categorie</th>
              
              <th style="text-transform:none;text-align:center;">Action</th>
            </tr>
        </thead>
    <tbody>
        <!-- @foreach($categories as $categorie) -->
        <tr>
          
          <td><strong>legumes</strong></td>
          
          <td style="text-align:center;">
            
            <form style="display:inline-block;margin-top:0%;"action="" method="post">
               
              <button type="submit"  style="color:#999;background-color:transparent;border:none;"><i style="font-size: 150%" class="fa fa-trash-o" aria-hidden="true" ></i> Delete</button>
            </form>
            </td>
        </tr>
        <!-- @endforeach -->
        
    </tbody>
</table>  
<!-- @else  -->
<!-- <h4>pas encore de categories..</h4> -->
<!-- @endif -->
</div>
<?php include "footerAdmin.php" ?>