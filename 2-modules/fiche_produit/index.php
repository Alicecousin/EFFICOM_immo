<?php 
	include("../../0-config/config.php");
	$id = $_GET['id'];
	$bienImmo = new immobilier();
	$mon_bien = $bienImmo->getDetailImmo($id);
?>
<?php include("../../0-config/header.php");?>

	<div class="container-fluid">
		<div class="row">
			<div class="detail_content">
          		<p>
	          		<strong><?php echo $mon_bien['lieux']?></strong>
	          		<?php echo $mon_bien['libelle_type']?>
					<?php echo $mon_bien['libelle_prestation']?>
	          		<?php echo $mon_bien['surface']." M²";?>
	          		<?php echo $mon_bien['pieces']." pièce(s)"?>
	          		<em class="red"><?php echo $mon_bien['prix']." €"?></em>
	          	</p>
          		
          		<div class="img">
          			<img src="<?php echo IMMO_IMAGE_DIR.$mon_bien['image'];?>">
          		</div>
          		<div class="clear" name="description">
          			<?php echo $mon_bien['description']?>;
				</div>
          	</div><!-- cnt-->		
		</div><!-- row-->
	</div><!-- container fluid-->

<?php include("../../0-config/footer.php");?>