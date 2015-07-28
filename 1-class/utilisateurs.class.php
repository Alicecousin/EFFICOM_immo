<?php 
	class utilisateurs extends bdd {
			public $id;	
			public $nom;
			public $pnom;
			public $email;
			public $login;
			public $mdp;

			function __construct(){
				parent::__construct();
			}

			function Ajouter(){
				$req = "INSERT INTO utilisateurs (nom,pnom,email,login,mdp) 
						VALUES ( :nom, :pnom, :email, :login, :mdp)";
			
				$bind["nom"]    = $this->nom;
				$bind["pnom"]   = $this->pnom;
				$bind["email"]  = $this->email;
				$bind["login"]  = $this->login;
				$bind["mdp"]    = $this->mdp;

				$req = $this->connexion->prepare($req);
				$req->execute($bind);

				// echo "Le client est bien ajouté";
			}

			function Modifier(){
				$req = " UPDATE utilisateurs SET nom = :nom,
						 pnom  = :pnom,
						 email = :email,
						 login = :login,
						 mdp   = :mdp 
						 WHERE id = :id
					   ";
				$bind["id"]    = $this->id;
				$bind["nom"]    = $this->nom;
				$bind["pnom"]   = $this->pnom;
				$bind["email"]  = $this->email;
				$bind["login"]  = $this->login;
				$bind["mdp"]    = $this->mdp;

				$req = $this->connexion->prepare($req);
				$req->execute($bind);

				// echo "Le client est bien ajouté";
			}		

			function Supprimer(){
				$req = "DELETE FROM utilisateurs WHERE id = :id ";
				$bind["id"]    = $this->id;

				$req = $this->connexion->prepare($req);
				$req->execute($bind);

				// echo "Le client est bien ajouté";
			}		

			function Charger(){
				$req = "SELECT * FROM utilisateurs WHERE id = ".$this->id;
				$tab = $this->Liste($req);
				$this->nom   = $tab[0]["nom"];
				$this->pnom  = $tab[0]["pnom"];
				$this->email = $tab[0]["email"];
				$this->login = $tab[0]["login"];
				$this->mdp   = $tab[0]["mdp"];
			}

			function Valider(){
				$req = "SELECT * FROM utilisateurs 
						WHERE login = :login
						AND mdp = :mdp ";
				$bind["login"]  = $this->login;
				$bind["mdp"]    = $this->mdp;

				$result = $this->connexion->prepare($req);
				$result->execute($bind);
				$ligne = $result->fetch(PDO::FETCH_ASSOC);
				if(count($ligne) > 0){
					echo 1;
					$this->id    = $ligne["id"];
					$this->nom   = $ligne["nom"];
					$this->pnom  = $ligne["pnom"];
					$this->email = $ligne["email"];

					$_SESSION["valid"] = 1;
				}
			}
			function Liste($req){
				
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