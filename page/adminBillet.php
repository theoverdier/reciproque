<?php
require_once('libs/global.php');
require_once('page/header.php');

// checkAccess();

if(isset($_GET['suppr']))
{
    executeQuery('DELETE FROM billet WHERE id = :id',
        array('id' => $_GET['suppr'])
    );
}

$actualCarnet = $_GET['goto'];

$listBillet = find ('SELECT * FROM billet');
?>
<div class="container">


	<?php
		//Affichage des billet sous forme de collection
		$numOfCols = 3;
		$rowCount = 0;
		$bootstrapColWidth = 12 / $numOfCols;
		echo '<h1>Ma liste de billet</h1><hr>';
		echo '<a href="editBillet.php?addto=' . $actualCarnet . '" class="btn btn-success">Ajouter un billet</a>';
		echo '<div class="row">';

		foreach($listBillet as $billet)
		{
	?>
		 <div class="col-md-<?php echo $bootstrapColWidth; ?>">
            <div class="thumbnail">
                <?php
                //Pour chaque billet, création d'un modal + carroussel
                echo '<a class="portfolio-item d-block mx-auto" data-toggle="modal" href="#BOITE' . $billet['id'] . '"><div class="alert alert-primary" role="alert"><b>' . $billet['Titre'] . '</b> ' . $billet['Artiste'] . '</b> ' .$billet['Description'] . '<a href="adminBillet.php?suppr=' . $billet['id'] . '" class="btn btn-danger">X</a></div></a>';

                echo '<!-- Modal -->
						<div class="modal fade" id="BOITE' . $billet['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLongTitle">'. $billet['Titre'] .'</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        ...
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div>
						    </div>
						  </div>
						</div>';
                ?>

            </div>
       	 </div>
	<?php
		//compteur colone pour automatiser les sauts à la ligne tout les 3 billets
	    $rowCount++;
	    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
	}
?>
		

</div>
<?php
require_once('page/footer.php');
?>
