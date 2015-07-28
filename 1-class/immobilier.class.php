<?php 
class immobilier extends bdd
{
	
	function __construct()
	{
		parent::__construct();
	}

	//recuperation de tous mes bien immobiliers par filtre de recherche
	public function searchImmo($type_presta='',$type_bien='',$nb_pieces='',
		$price='', $surface='', $localisation='')
	{
		if(empty($type_presta) && empty($type_bien) 
		&& empty($nb_pieces) && empty($price)
		&& empty($localisation) && empty($surface)){
			$req = "SELECT * FROM bien_immo, type_bien, type_prestation ";
			$req .= "WHERE bien_immo.type_bien = type_bien.id ";
			$req .= "AND bien_immo.type_prestation = type_prestation.id ";
			$req .= " ORDER BY prix asc";
		}else{

			$req = "SELECT * FROM bien_immo, type_bien, type_prestation ";
			$req .= "WHERE bien_immo.type_bien = type_bien.id ";
			$req .= "AND bien_immo.type_prestation = type_prestation.id ";
			$req .= " AND type_bien=".$type_bien. " AND type_prestation=".$type_presta;
			
			if($nb_pieces != '000')
				$req .= " AND pieces = ".$nb_pieces;
			if(!empty($surface))
				$req .= " AND surface >= ".$surface;
			if(!empty($price))
				$req .= " AND prix <= ".$price;
			if(!empty($localisation))
				$req .= " AND lower(lieux) = '".strtolower($localisation)."'";

			$req .= " ORDER BY prix asc";

		}

		$result = $this->connexion->prepare($req);
		$result->execute();
		$struct = array();
		$ligne="";

		while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
			$struct[] = $ligne;
		}

		return $struct;
	}

	//recuperation d'un bien immo a partir de son identifiant
	public function getDetailImmo($id_immo){
		$req = "SELECT * FROM bien_immo ".
		",type_prestation, type_bien ". 
		"WHERE bien_immo.type_bien = type_bien.id ". 
		"AND bien_immo.type_prestation = type_prestation.id
		AND id_immo = ".$id_immo;
		
		$result = $this->connexion->prepare($req);
		$result->execute();

		$bien = '';
		while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
			return $bien = $ligne;
		}

		return $bien;
	}


	//ajout d'un bien
	public function insertBien($type_presta, $type_bien, $nb_pieces,
		$price, $surface, $localisation,$description){

		$req = "INSERT INTO bien_immo(lieux, pieces, 
			surface, prix, description,
			type_bien, type_prestation) 
			VALUES(:localisation,
			:nb_pieces, :surface, :price, :description,
			:type_bien,:type_presta)";


		$bind["localisation"]  = $localisation;
		$bind["nb_pieces"] = $nb_pieces;
		$bind["surface"]  = $surface;
		$bind["price"]  = $price;
		$bind["description"] = $description;
		$bind["type_bien"]  = $type_bien;
		$bind["type_presta"]  = $type_presta;

		$req = $this->connexion->prepare($req);
		$req->execute($bind);

		return 1;
	}
}
?>
