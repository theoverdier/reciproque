<?php
require_once('libs/global.php');

// checkAccess();

if(isset($_GET['suppr']))
{
    executeQuery('DELETE FROM billet WHERE id = :id',
        array('id' => $_GET['suppr'])
    );
}

$actualCarnet = $_GET['goto'];


require_once('page/header.php');
$listBillet = find ('SELECT * FROM billet');
?>
<div class="container">

	<?php
		echo '<h1>Ma liste de carnet</h1><hr>';

		foreach($listBillet as $billet)
		{
			echo '<div class="alert alert-primary" role="alert"><b>' . $billet['Titre'] . '</b> ' . $billet['Artiste'] . '</b> ' .$billet['Description'] . '<a href="adminBillet.php?suppr=' . $billet['id'] . '" class="btn btn-danger">X</a></div>';

		}
	?>

<?php
echo '<a href="editBillet.php?addto=' . $actualCarnet . '" class="btn btn-danger">Ajouter un billet</a>'
?>

</div>
<?php
require_once('page/footer.php');
?>
