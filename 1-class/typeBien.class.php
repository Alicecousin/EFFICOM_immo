<?php 
class typeBien extends bdd
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function liste(){
		$req = "SELECT * FROM type_bien";
		$result = $this->connexion->prepare($req);
		$result->execute();
		$struct = array();
		$ligne="";
		while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
			$struct[] = $ligne;
		}
		return $struct;
	}
}
