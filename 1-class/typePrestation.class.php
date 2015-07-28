<?php 
class typePrestation extends bdd
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function liste(){
		$req = "SELECT * FROM type_prestation";
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