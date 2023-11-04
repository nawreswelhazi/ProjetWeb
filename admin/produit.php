<?php include "headerAdmin.php" ?>

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
            <tr>
              
              <td><strong>tomate</strong></td>
              <td>legumes</td>
              <td>12345</td>
              <td>50</td>
              <td>
                <a href="" style="color:#999"><i style="font-size: 150%"  class="fa fa-edit" aria-hidden="true" ></i> Afficher</a>
                <form style="display: inline-block;margin-top:0%;:relative;"action="" method="post">
                    
                  <button type="submit"  style="color:#999;background-color:transparent;border:none;"><i style="font-size: 150%" class="fa fa-trash-o" aria-hidden="true" ></i> Delete</button>
                </form>
                </td>
            </tr>
            <!-- @endforeach -->
            
        </tbody>
    </table>
    <!-- @else -->
    <!-- <h4>pas encore de produits..</h4> -->
    <!-- @endif -->
</div>

<!-- @endsection -->

<?php include "footerAdmin.php" ?>