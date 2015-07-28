<?php include("../../0-config/config.php");
      include("../../0-config/header.php");

  	$type_presta = isset($_POST['location_achat'])?$_POST['location_achat'] : "";
	$type_bien = isset($_POST['type_bien'])?$_POST['type_bien'] : "";
	$nb_pieces = isset($_POST['nb_pieces'])?$_POST['nb_pieces'] : "";
	$budget = isset($_POST['budget'])?$_POST['budget'] : "";
	$localisation = isset($_POST['localisation'])?$_POST['localisation'] : "";
	$surface = isset($_POST['surface'])?$_POST['surface'] : "";
	$description = isset($_POST['description'])?$_POST['description'] : "";
	
	/*$userfile = $_FILES["image"]["name"];

	$uploaddir = '/img/immo_images/small/';
	$uploadfile = $uploaddir . basename($userfile);


	if (move_uploaded_file($userfile, $uploadfile)) {
	    echo "Le fichier est valide, et a été téléchargé
	           avec succès. Voici plus d'informations :\n";die();
	}else{
		echo "ca na pas marche";die();
	} */

	$bienImmo = new immobilier();
	$res = $bienImmo->insertBien($type_presta, $type_bien, $nb_pieces,
		$budget, $surface, $localisation,$description);

	if($res == 1){
		$_SESSION['success'] = 1;
		header("Location: index.php");
	}
	


 ?>