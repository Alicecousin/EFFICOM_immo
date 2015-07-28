<?php 
	class bdd{
		public $connexion;
		function __construct(){				
			$this->connexion = new PDO('mysql:host='.PARAM_hote.';port='.PARAM_port.';dbname='.PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		}
	}// Fin de class bdd
 ?>