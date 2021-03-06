<?php 
	include("../../0-config/config.php");

	$type_presta = isset($_POST['location_achat'])?$_POST['location_achat'] : "";
	$type_bien = isset($_POST['type_bien'])?$_POST['type_bien'] : "";
	$nb_pieces = isset($_POST['nb_pieces'])?$_POST['nb_pieces'] : "";
	$budget = isset($_POST['budget'])?$_POST['budget'] : "";
	$localisation = isset($_POST['localisation'])?$_POST['localisation'] : "";
	$surface = isset($_POST['surface'])?$_POST['surface'] : "";

	$bienImmo = new immobilier();
	$listeImmo = $bienImmo->searchImmo($type_presta, $type_bien,$nb_pieces,
	$budget,$surface, $localisation);
?>
<?php include("../../0-config/header.php");?>

	<div class="container-fluid">
		<div class="row">
			<?php foreach ($listeImmo as $key => $value) {?>
			<div class="col-md-2 cnt">
          		<h2 class="lieux_foyer"><?php echo $value['lieux']?></h2>
          		<?php echo $value['libelle_prestation']?>
          		<div>
          			<img src="<?php echo IMMO_IMAGE_DIR.$value['image'];?>">
          		</div>
          		<div class="clear"></div>
          		<div class="text-center margin">
	          		<p>
	          		<?php echo $value['libelle_type']?>
	          				<?php echo $value['surface']." M²";?></br>
	          				<?php echo $value['pieces']." pièce(s)"?>
	          		</p>
	          		<h3 class="red"><?php echo $value['prix']." €"?></h3>
          		</div>
          		
          		<div class="text-center">
          			<a class="btn btn-default" href="
          			<?php echo URL."2-modules/fiche_produit/index.php?id=".$value['id_immo'] ?>"
          			    role="button">Voir details &raquo;</a>
          		</div>

        	</div>
			<?php }?>  			
			</div>
	</div>

<?php include("../../0-config/footer.php");?>
