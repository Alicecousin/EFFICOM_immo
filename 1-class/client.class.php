<?php 
	class client extends bdd {
			public $id;	
			public $nom;
			public $pnom;
			public $age;

			function __construct(){
				parent::__construct();
			}

			function Ajout(){
				$req = "INSERT INTO client (nom,pnom,age) 
						VALUES (:nom, :pnom, :age)";
			
				$bind["nom"]  = $this->nom;
				$bind["pnom"] = $this->pnom;
				$bind["age"]  = $this->age;

				$req = $this->connexion->prepare($req);
				$req->execute($bind);

				echo "Le client est bien ajouté";
			}	

			function Liste(){
				$req = "SELECT * FROM client  ORDER BY age asc ";
				$result = $this->connexion->prepare($req);
				$result->execute();
				$struct = array();
				$ligne="";
				while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
					$struct[] = $ligne;
				}
				return $struct;
			}
	} // Fin de class 
 ?>