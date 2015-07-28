<?php include("../../0-config/config.php"); 
$rech = $_GET["rech"];
?>

<table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Login</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php $u = new utilisateurs;
                      $req = "SELECT * FROM utilisateurs
                      		  WHERE nom LIKE '%".$rech."%' 
                      		  OR pnom LIKE '%".$rech."%'
                      		  OR login LIKE '%".$rech."%'";
                      $tab = $u->Liste($req);
                      foreach ($tab as $key => $ligne) { ?>
                       <tr>
                         <td><?php echo $ligne["id"]; ?></td>
                         <td><?php echo $ligne["nom"]; ?></td>
                         <td><?php echo $ligne["pnom"]; ?></td>
                         <td><?php echo $ligne["email"]; ?></td>
                         <td><?php echo $ligne["login"]; ?></td>
                         <td>
                           <a class="btn btn-success" href="form.php?action=2&id=<?php echo $ligne["id"]; ?>">
                             <i class="glyphicon glyphicon-edit"></i>  Modifier
                          </a>
                         </td>
                         <td>
                           <a class="btn btn-danger" href="index.php?action=3&id=<?php echo $ligne["id"]; ?>">
                             <i class="glyphicon glyphicon-trash"></i>  Supprimer
                          </a>
                         </td>
                       </tr>
                <?php } ?>
                
              </tbody>  
            </table>