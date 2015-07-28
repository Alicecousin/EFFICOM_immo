<?php include("0-config/config.php");
      include("0-config/header.php");?>
      <body id="fond">

    <container>
		  <div class="container-fluid">
      		<div class="row">          			
          		<div class="col-md-6">
          			
          		</div> 

          		<div class="col-md-6 ">
            			<section class="recherche">
             				<h1>Recherche</h1>
             								
             				
              <form method="POST" action="<?php URL ?>2-modules/recherche/index.php" id="myform">
              	

  				  <ul>
  					   <li>
               <div class="checkbox">
                    <?php $typePresta = new typePrestation();
                        $types_presta = $typePresta->liste(); $i = 0; ?>
                        <?php foreach ($types_presta as $id => $typepresta) {?>  
                          <input type="radio" name="location_achat" id="check_achat"
                          value="<?php echo $typepresta['id'];?>" 
                          <?php if($i === 0){echo 'checked=checked';}?> />
                          <label for="location_achat">
                            <?php echo $typepresta['libelle_prestation'];?>
                          </label>
                        <?php $i++;} ?>
                  </div><br/>
              			<label>Type de bien :</label>
                      <?php $typeBien = new typeBien();
                        $types = $typeBien->liste();?>
                			<select class="form-control" name="type_bien">
                        <?php foreach ($types as $id => $type) {?>                        
                			<option value="<?php echo $type['id'];?>">
                        <?php echo $type['libelle_type'];?>
                      </option> 
                      <?php } ?>
  					       </select><br/>

            				<label class="localisation">Localisation :</label>
            				<input type="text" class="form-control" id="localisation" name="localisation" 
                    placeholder="ex : Paris 08"/>
                  </li>				
          						
          						
          				<li>
                	 <label>Nombre de pièces :</label>
                    <?php $nbPieces = new nbPieces();
                        $types = $nbPieces->liste();?>
                        <select class="form-control" name="nb_pieces">
                          <option value="000">Tous</option> 
                            <?php foreach ($types as $id => $type) {?>                        
                          <option value="<?php echo $type['id'];?>">
                                  <?php echo $type['libelle'];?>
                          </option> 
                           <?php } ?>
                        </select>
                    <label>surface minimun (en m<SUP>2</SUP>) :</label>
            				<div>
                      <input type="text" class="form-control" id="surface-vente" name="surface"/><br/>
            				</div>

                	  <label>Budget maximun (en €) :</label>
               	    <input type="text" name="budget" class="form-control"><br/>
                    
  					           <a href="<?php URL ?>2-modules/recherche/index.php?" id="liste_annonce"> Voir toutes les annonces</a><br/>
                    
                    <input type="submit" value="Recherche" class="btn btn-default" style="color:#1c1c21;">
              		</li>
                </ul>
              </form>
  					</section>	
          </div>
        </div>
    	</div>
    </container>
    </body>