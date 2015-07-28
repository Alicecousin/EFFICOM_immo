<?php 
class nbPieces extends bdd
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function liste(){
		$req = "SELECT * FROM nb_pieces";
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

	/*public function searchImmo($type, $nb_pieces,$price,$surface){
		$req = "SELECT * FROM achat ";
		if(!empty($type) || $nb_pieces != "Tous" || !empty($surface) || !empty($price) ){
			$req .= " WHERE ";
		}

		if(!empty($type)){
			$req .= " type = ".$type;
		}

		if(!empty($nb_pieces)){
			$req .= " n = ".$type;
		}



		$req .= " ORDER BY prix asc";

				$result = $this->connexion->prepare($req);
				$result->execute();
				$struct = array();
				$ligne="";
				while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
					$struct[] = $ligne;
				}
				return $struct;

	}*/