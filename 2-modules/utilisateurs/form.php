<?php include("../../0-config/config.php"); 
  if($_GET["action"] == 1) $mode = 1;
  if($_GET["action"] == 2) $mode = 2;

  if($mode == 2){
    $u = new utilisateurs;
    $u->id = $_GET["id"];
    $u->Charger();
    //var_dump($u);
  }

?>
<!DOCTYPE html>
<html lang="fr">
    
  <body>
<?php Entete(); ?>
    <?php Menu(2); ?>

    <h1>GESTION <small>Utilisateurs</small>
     <?php if($mode == 1) echo '<span class="label label-info">Ajout</span>'; ?>
     <?php if($mode == 2) echo '<span class="label label-success">Modification</span>'; ?>
    </h1>
    <hr>

    <container>
      <div class="row">
        <div class="col-md-4">
          <h2>Formulaire <small>Utilisateurs</small></h2>
          <hr>
          <?php if($mode==1){ ?>
            <form method="POST" action="index.php?action=1" id="myform">
              <label>Nom</label>
              <input type="text" name="nom" class="form-control">

              <label>Prenom</label>
              <input type="text" name="pnom" class="form-control">

              <label>Email</label>
              <input type="email" name="email" class="form-control">

              <label>Login</label>
              <input type="text" name="login" class="form-control">

              <label>Mot de Passe</label>
              <input type="text" name="mdp" class="form-control">

              <button class="btn btn-info" type="submit">Ajouter</button>
              <button id="btn-ajax-1" class="btn btn-success" type="button">Ajax</button>
              <button class="btn btn-default" type="reset">Annuler</button>
              <a class="btn btn-primary" href="index.php">Retour</a>
            </form>
          <?php } ?>

          <?php if($mode==2){ ?>
            <form method="POST" action="index.php?action=2&id=<?php echo $_GET["id"]; ?>">
              <label>Nom</label>
              <input type="text" name="nom" class="form-control" value="<?php echo $u->nom; ?>">

              <label>Prenom</label>
              <input type="text" name="pnom" class="form-control" value="<?php echo $u->pnom; ?>">

              <label>Email</label>
              <input type="email" name="email" class="form-control" value="<?php echo $u->email; ?>">

              <label>Login</label>
              <input type="text" name="login" class="form-control" value="<?php echo $u->login; ?>">

              <label>Mot de Passe</label>
              <input type="text" name="mdp" class="form-control" value="<?php echo $u->mdp; ?>">

              <button class="btn btn-success" type="submit">Modifier</button>
              <button class="btn btn-default" type="reset">Annuler</button>
              <a class="btn btn-primary" href="index.php">Retour</a>
            </form>
          <?php } ?>
        </div>  <!-- Fin de col -->
        <div class="col-md-4">
          <p id="p-success" class="bg-success hidden">
            Félicitations vous avez enregitrer un utilisateur en Ajax !!
          </p>

           <p id="p-wait" class="bg-danger hidden">
            Veuillez Patientez SVP
          </p>
        </div>       
      </div> <!-- Fin de la row -->
    </container> <!-- Fin du container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $("#btn-ajax-1").on("click",function(){
          var datas = $("#myform").serialize();
          // alert(datas);
          $.ajax({
            type: "POST",
            url: "ajax.php?action=1",
            data: datas,
            success:function(msg){
              $("#p-success").addClass("zoomInDown animated").removeClass("hidden");
              $("#p-wait").addClass("hidden");
              alert(msg);
            }
          });
        });
      });

    </script>
  </body>
</html>