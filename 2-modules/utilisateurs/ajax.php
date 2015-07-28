<?php include("../../0-config/config.php"); 
	$action = $_GET["action"];

	//Verification mode ajout
	if($action == 1){
		$u = new utilisateurs;
		$u->nom   = $_POST["nom"];
		$u->pnom  = $_POST["pnom"];
		$u->email = $_POST["email"];
		$u->login = $_POST["login"];
		$u->mdp   = $_POST["mdp"];
		$u->Ajouter();

		echo $u->nom." ".$u->pnom;
		unset($u);


	}

	
if($action == 2){
	 $u = new utilisateurs;
	 $u->id = $_POST["id"];
	 $u->Changer();
      $u->nom   = $_POST["nom"];
      $u->pnom  = $_POST["pnom"];
      $u->email = $_POST["email"];
      $u->login = $_POST["login"];
      $u->mdp   = $_POST["mdp"];
      $u->Modifier();
      unset($u);
}

?>