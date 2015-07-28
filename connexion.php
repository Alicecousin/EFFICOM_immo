<?php include("0-config/config.php"); 
	
	if(count($_POST) > 0) {
		$u = new utilisateurs;
		$u->login = $_POST["login"];
		$u->mdp   = $_POST["mdp"];
		$u->Valider();
	
		header("Location: index.php");
	}

  if(isset($_GET["action"]) && $_GET["action"] == "deco"){
    unset($_SESSION["valid"]);
  }
?>
<!DOCTYPE html>
<html lang="fr">
  <?php Entete(); ?>
  <body>
    

    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h1>Page de Connexion</h1>
 				<form method="POST" action="connexion.php">
 					<label>Login</label>
 					<input type="text" name="login" class="form-control">

 					<label>Mot de passe</label>
 					<input type="password" name="mdp" class="form-control">
 					<br>
 					<button type="submit" class="btn btn-success">
 						<i class="glyphicon glyphicon-lock"></i> 
 						Connexion
 					</button>

 					<button class="btn btn-default" type="reset"> Annuler </button>
 				</form>   			
    		</div>				
    	</div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>