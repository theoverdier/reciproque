<?php
require_once('libs/global.php');
require_once('page/header.php');

checkAccess();

$actualCarnet = $_GET['goto'];

if(isset($_GET['suppr']))
{
    executeQuery('DELETE FROM billet WHERE id = :id AND userid = :userid',
        array(
        	'id' => $_GET['suppr'],
        	'userid' => $_SESSION['userid']
        )
    );
    
    header('location: adminBillet.php?goto='.$actualCarnet);
}

$listBillet = find ('SELECT * FROM billet WHERE nom_carnet="'.$actualCarnet.'"AND userid="'.$_SESSION['userid'].'"');

?>
<div class="container">
	<h1>Ma liste de billet</h1><hr>
	<a href="editBillet.php?addto=<?php echo $actualCarnet; ?>" class="btn btn-success">Ajouter un billet</a>
<!-- 	<a href="photo.php" class="btn btn-success">Test photo</a> -->
	<div class="row">



	<?php
		//Affichage des billet sous forme de collection
		$numOfCols = 3;
		$rowCount = 0;
		$bootstrapColWidth = 12 / $numOfCols;
		$photo = array("salut","le","carrousel");

		foreach($listBillet as $billet)
		{
	?>
		 <div class="col-md-<?php echo $bootstrapColWidth; ?>">
            <div class="thumbnail">
                <?php
                //Pour chaque billet, création d'un modal + carroussel
                echo '<a class="portfolio-item d-block mx-auto" data-toggle="modal" href="#BOITE' . $billet['id'] . '"><div class="alert alert-primary" role="alert"><b>' . $billet['titre'] . '</b> ' . $billet['artiste'] . '</b> ' .$billet['description'] . '<a href="adminBillet.php?suppr=' . $billet['id'] .'&goto='.$actualCarnet.'" class="btn btn-danger">X</a></div></a>';

                echo '<!-- Modal -->
						<div class="modal fade" id="BOITE' . $billet['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLongTitle">'. $billet['titre'] .'</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <!-- Carousel -->
								    <div id="carouselExampleControls'. $billet['id'] .'" class="carousel slide" data-ride="carousel" data-interval="false">
									    <div class="carousel-inner">

											<div class="carousel-item active">
						                      <div class="col-lg-8 mx-auto" class="d-block w-100">
						                        <h2 class="text-secondary text-uppercase mb-0">Créations digitales</h2>
						                        <hr class="star-dark mb-5">
						                        <p class="mb-5">Ceci est le billet principale</p>
						                        ';
						                        require('photo.php');
				?>

						                      </div>
					                        </div>
				
											<?php
											
												foreach($listePhoto as $lesphotos){
											        echo '<div class="carousel-item"><img src = "images/'.$lesphotos['nom'].'"/></div>';
											    }
									                    
									    echo '</div>
					                  <a class="carousel-control-prev" href="#carouselExampleControls'. $billet['id'] .'" role="button" data-slide="prev">
					                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					                    <span class="sr-only">Previous</span>
									  </a>
					                  <a class="carousel-control-next" href="#carouselExampleControls'. $billet['id'] .'" role="button" data-slide="next">
					                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					                    <span class="sr-only">Next</span>
					                  </a>
					                </div>
							      </div>
							      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

            </div>
       	 </div>';
	
		//compteur colone pour automatiser les sauts à la ligne tout les 3 billets
	    $rowCount++;
	    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
	}
?>
		

</div>
<?php
require_once('page/footer.php');
?>
