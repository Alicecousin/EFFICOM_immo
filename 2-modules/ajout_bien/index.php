<?php include("../../0-config/config.php");
      include("../../0-config/header.php");
  ?>

<!DOCTYPE html>
<html lang="fr">
    <?php Entete(); ?>

    
<body>
    <div class="container">
      <div class="row">
         <?php if(isset($_SESSION['success']) && $_SESSION['success'] === 1){?>        
            <p id="p-success" class="bg-success">
              Vous bien immobilier à bien été ajouté.
            </p>
          <?php } unset($_SESSION['success']); ?>
        <div class="col-md-4">
          <h1>Vendre <small>un bien</small></h1>
          <hr>
            <h2><small>Formulaire d'ajout de bien immobilier</small></h2>

            <form method="POST" action="<?php echo URL ?>2-modules/ajout_bien/add_bien.php" 
            id="myform" enctype="multipart/form-data">
            <?php $typePresta = new typePrestation();
                  $types_presta = $typePresta->liste(); $i = 0; ?>
            <?php foreach ($types_presta as $id => $typepresta) {?>  
            <input type="radio" name="location_achat" id="check_achat"
                  value="<?php echo $typepresta['id'];?>" 
            <?php if($i === 0){echo 'checked=checked';}?> />
            <label for="location_achat">
              <?php echo $typepresta['libelle_prestation'];?>
            </label>
            <?php $i++;} ?>
              <br/>

            <label>Type de bien</label>
              <?php $typeBien = new typeBien();
                    $types = $typeBien->liste();?>
              <select class="form-control" name="type_bien">
                <?php foreach ($types as $id => $type) {?>                        
                <option value="<?php echo $type['id'];?>">
                  <?php echo $type['libelle_type'];?>
                </option> 
                  <?php } ?>
              </select>
              <br/>

              <label>Localisation</label>
              <input type="text" class="form-control" id="localisation" name="localisation" 
                    placeholder="ex : Paris 08"/>
              <br/>

              <label>Surface</label>
              <input type="text" class="form-control" id="surface-vente" name="surface" placeholder="ex : 100"/>
              <br/>

              <label>Nombre de pièce</label>
                <input type="text" class="form-control" id="surface-vente" name="nb_pieces" placeholder="ex : 3"/>
                        
              <label>Prix</label>
              <input type="text" name="budget" class="form-control" placeholder="ex : 11200">

              <label>Description</label>
              <textarea rows="4" name="description" class="form-control" cols="50"></textarea>
            

              <label>Photo</label></br>
              <input type="file" name="image">
              <br/>

              <input class="btn btn-success" type="submit" value="Ajouter">
              <a class="btn btn-edit" href="index.php">Retour</a>
             </form>

        </div> <!-- Fin de col -->
      </div> <!-- Fin du row -->
    </div> <!-- Fin du container -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#rech").on("keyup",function(){
              var rech = $("#rech").val();
            $("#datagrid").load("rech.php?rech="+rech);
        });
      });  
    </script>
    <?php include("../../0-config/footer.php");?>
</body>

</html>
