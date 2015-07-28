<?php if(!session_id()) session_start();
	define("URL","http://localhost/TP2/");
	$dir = URL."/img/immo_images/small/";
	define("IMMO_IMAGE_DIR", $dir);
	if(!isset($_SESSION["valid"])){
		if(substr_count($_SERVER["PHP_SELF"],"connexion.php") == 0){
			header("Location: ".URL."connexion.php");
		}
	}
	
	$PARAM_hote='localhost'; // le chemin vers le serveur
	$PARAM_port='3306';
	// $PARAM_nom_bd='IVTEC-PROD'; // le nom de votre base de données
	$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
	$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
	// Pour les mac
	//$PARAM_mot_passe='root'; // mot de passe de l'utilisateur pour se connecter
	$PARAM_nom_bd = "exos";// Pour la bse de données exos

	define("PARAM_hote",$PARAM_hote);
	define("PARAM_port",$PARAM_port);
	define("PARAM_utilisateur",$PARAM_utilisateur);
	define("PARAM_mot_passe",$PARAM_mot_passe);
	define("PARAM_nom_bd",$PARAM_nom_bd);


	include(__DIR__."/../1-class/bdd.class.php");
	include(__DIR__."/../1-class/client.class.php");
	include(__DIR__."/../1-class/utilisateurs.class.php");
	include(__DIR__."/../1-class/typeBien.class.php");
	include(__DIR__."/../1-class/typePrestation.class.php");
	include(__DIR__."/../1-class/immobilier.class.php");
	include(__DIR__."/../1-class/nbPieces.class.php");

	function Entete(){ ?>
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		  <title>Admin Immo</title>

		  <!-- Bootstrap -->
		  <link href="<?php echo URL ?>/css/bootstrap.min.css" rel="stylesheet">
		  <link rel="stylesheet" type="text/css" href="<?php echo URL ?>/css/animate.css">
		  <link rel="stylesheet" type="text/css" href="<?php echo URL ?>/css/style.css">
		</head>
	<?php }

	/*********** Fonction qui affiche le menu  ************/
	function Menu($page){ ?>
		<header>
		  <nav class="navbar navbar-inverse fixed">
		    <div class="container-fluid">
		      <!-- Brand and toggle get grouped for better mobile display -->
		      <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		          <span class="sr-only">Toggle navigation</span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		        </button>
		      
		      </div>

		      <!-- Collect the nav links, forms, and other content for toggling -->
		      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav">
		          <li <?php if($page == 1) echo 'class="active"'; ?>>
		            <a href="<?php echo URL; ?>">
		              <i class="glyphicon glyphicon-home"></i> Paris Immo <span class="sr-only">(current)</span>
		            </a>
		          </li>
		          <li <?php if($page == 2) echo 'class="active"'; ?>>
		            <a href="<?php echo URL; ?>2-modules/utilisateurs/">
		              <i class="glyphicon glyphicon-user"></i> Utilisateurs <span class="sr-only">(current)</span>
		            </a>
		          </li>
		          <li <?php if($page == 2) echo 'class="active"'; ?>>
		            <a href="<?php echo URL; ?>2-modules/ajout_bien/index.php/">
		               Vendre un bien <span class="sr-only">(current)</span>
		            </a>
		          </li>

		           <li>
		            <a href="<?php echo URL; ?>connexion.php?action=deco" class="btn btn-danger" style="color:white;">
		              <i class="glyphicon glyphicon-off"></i> Déconnexion <span class="sr-only">(current)</span>
		            </a>
		          </li>

		        </ul>
		        
		        
		      </div><!-- /.navbar-collapse -->
		    </div><!-- /.container-fluid -->
		  </nav> 
		</header>
		


	<?php }
	function footer(){?>
		<footer>
		<div class="container-fluid">
    		<div class="row">
          		<div class="col-md-3">
          			<p><a href="#">Notre groupe</a></p>
          		</div> 
          		<div class="col-md-3">
          			<p><a href="#">Nous contacter</a></p>
          		</div> 
          		<div class="col-md-3">
          			<p><a href="#">Recrutement</a></p>
          		</div> 
          		<div class="col-md-3">
          			<p><a href="#">Mentions légales</a></p>
          		</div> 
			</div>
			</div>
		</footer>
	<?php };
	/*********** Fin de Fonction *************************/;
 ?>