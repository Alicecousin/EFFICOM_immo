<?php include("../../0-config/config.php"); 
  if(isset($_GET["action"])){
    $mode = $_GET["action"];
    if($mode == 1){ //En mode Ajout
      $u = new utilisateurs;
      $u->nom   = $_POST["nom"];
      $u->pnom  = $_POST["pnom"];
      $u->email = $_POST["email"];
      $u->login = $_POST["login"];
      $u->mdp   = $_POST["mdp"];
      $u->Ajouter();
      unset($u);
      header("Location: index.php");
    } //Fin du mode Ajout

    if($mode ==2){ //Mode modification
      $u = new utilisateurs;
      $u->id    = $_GET["id"];
      $u->nom   = $_POST["nom"];
      $u->pnom  = $_POST["pnom"];
      $u->email = $_POST["email"];
      $u->login = $_POST["login"];
      $u->mdp   = $_POST["mdp"];
      $u->Modifier();
      unset($u);
      header("Location: index.php");
    } //Fin du mode modification

    if($mode ==3){ //Mode Suppression
      $u = new utilisateurs;
      $u->id  = $_GET["id"];
      $u->Supprimer();
      unset($u);
      header("Location: index.php");
    } //Fin du mode modification
  }
?>
<?php include("../../0-config/header.php");?>
    <h1>GESTION <small>Utilisateurs</small></h1>
    <hr>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form>
            <input type="text" name="rech" id="rech" class="form-control">
          </form>
          <br><br>
          <a class="btn btn-info btn-lg" href="form.php?action=1"> 
           <i class="glyphicon glyphicon-plus-sign"></i> Ajouter
          </a>
          <div id="datagrid">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Login</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php $u = new utilisateurs;
                      $req = "SELECT * FROM utilisateurs";
                      $tab = $u->Liste($req);
                      foreach ($tab as $key => $ligne) { ?>
                       <tr>
                         <td><?php echo $ligne["id"]; ?></td>
                         <td><?php echo $ligne["nom"]; ?></td>
                         <td><?php echo $ligne["pnom"]; ?></td>
                         <td><?php echo $ligne["email"]; ?></td>
                         <td><?php echo $ligne["login"]; ?></td>
                         <td>
                           <a class="btn btn-success" href="form.php?action=2&id=<?php echo $ligne["id"]; ?>">
                             <i class="glyphicon glyphicon-edit"></i>  Modifier
                          </a>
                         </td>
                         <td>
                           <a class="btn btn-danger" href="index.php?action=3&id=<?php echo $ligne["id"]; ?>">
                             <i class="glyphicon glyphicon-trash"></i>  Supprimer
                          </a>
                         </td>
                       </tr>
                <?php } ?>
                
              </tbody>  
            </table>
          </div>
        </div>  <!-- Fin de col -->       
      </div> <!-- Fin de la row -->
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