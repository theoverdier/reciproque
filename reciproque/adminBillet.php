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

$listBillet = find ('SELECT * FROM billet WHERE carnet_id='.$actualCarnet.' AND userid="'.$_SESSION['userid'].'"');

if(isset ($_POST['billet'])) {
	if ($_FILES['fichier']['error']) {
  		switch ($_FILES['mon_fichier']['error']) {
		    case 1: // UPLOAD_ERR_INI_SIZE
		        echo "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";
		        break;
		    case 2: // UPLOAD_ERR_FORM_SIZE
		        echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
		        break;
		    case 3: // UPLOAD_ERR_PARTIAL
		        echo "L'envoi du fichier a été interrompu pendant le transfert !";
		        break;
		    case 4: // UPLOAD_ERR_NO_FILE
		        echo "Le fichier que vous avez envoyé a une taille nulle !";
		        break;
    	}
	}
	else {
	    $name = uniqid();
	    $extension = strrchr($_FILES['fichier']['name'] ,'.');
	    $nom = $_FILES['fichier']['tmp_name'];
	    $destination = 'images/'.$name.$extension;
	    move_uploaded_file($nom, $destination);
	    executeQuery(
	        'INSERT INTO photo(nom, billet_id) VALUES(:name, :billet_id)',
	        array(
	            'name' => htmlentities($name.$extension),
	            'billet_id' => $_POST['billet']
	        )
	    );

	    header('location: adminBillet.php?goto='.$actualCarnet);
	}
}

?>
<script type="text/javascript" src="js/admin.js"></script>
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
                $listPhotos = find ('SELECT * FROM photo WHERE billet_id='.$billet['id']);
                //Pour chaque billet, création d'un modal + carroussel
                echo '<div class="alert alert-primary openModal" data-billet="' . $billet['id'] .'"><b>' . $billet['titre'] . '</b><br>' . $billet['artiste'] . '<br>' .$billet['description'] . '<br><a href="adminBillet.php?suppr=' . $billet['id'] .'&goto='.$actualCarnet.'" class="btn btn-danger">X</a>
                	<div class="listPhotos">';
                		foreach($listPhotos as $photo){
					        echo '<img src="images/'.$photo['nom'].'" alt="">';
					    }
                	echo'</div>
                	</div>
	    		</div>
	 		</div>';
			//compteur colone pour automatiser les sauts à la ligne tout les 3 billets
		    $rowCount++;
	    	if($rowCount % $numOfCols == 0)
	    		echo '</div><div class="row">';
		}
		?>
		
</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title"></h5>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      				<span aria-hidden="true">&times;</span>
    			</button>
      		</div>
      		<div class="modal-body">
        		<!-- Carousel -->
			    <div class="carousel slide" data-ride="carousel" data-interval="false">
				    <div class="carousel-inner">
						<div class="carousel-item active">
	                      	<div class="col-lg-8 mx-auto" class="d-block w-100">
		                        <h2 class="text-secondary text-uppercase mb-0">Créations digitales</h2>
		                        <hr class="star-dark mb-5">
		                        <p class="mb-5">Ceci est le billet principal</p>
	                      	</div>
	                    </div>      
					</div>
		          	<a class="carousel-control-prev" href=".carousel" role="button" data-slide="prev">
		            	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		                <span class="sr-only">Previous</span>
				  	</a>
		          	<a class="carousel-control-next" href=".carousel" role="button" data-slide="next">
		                <span class="carousel-control-next-icon" aria-hidden="true"></span>
		                <span class="sr-only">Next</span>
		        	</a>
            	</div>
            	<form action="" method="post" enctype="multipart/form-data">
			        <!--<input type="hidden" name="MAX_FILE_SIZE" value="50000">-->
			        <input type="hidden" name="billet">
			        <label>Votre fichier : <input type="file" name="fichier"></label><br>
			        <input type="submit" value="Envoyer">
			    </form>
  			</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>

<?php
require_once('page/footer.php');
?>
