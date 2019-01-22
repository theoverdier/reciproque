<?php
require_once('libs/global.php');

// checkAccess();

if(isset($_GET['suppr']))
{
    executeQuery('DELETE FROM carnet WHERE id = :id',
        array('id' => $_GET['suppr'])
    );
}


// '<a href="adminBillet.php?goto=' . $carnet['Nom'] . '" class="btn btn-danger">consulter carnet</a>'



$list = find ('SELECT * FROM carnet');

require_once('page/header.php');
?>
<div class="container">

	<?php
		echo '<h1>Ma liste de carnet</h1><hr>';

		foreach($list as $carnet)
		{
			echo '<div class="alert alert-primary" role="alert"><b>' . '<a href="adminBillet.php?goto=' . $carnet['Nom'] . '" class="btn btn-danger">consulter carnet</a>' . '</b> ' . $carnet['Lieu'] . '</b> ' .$carnet['Description'] . '<a href="admin.php?suppr=' . $carnet['id'] . '" class="btn btn-danger">X</a></div>';

		}
	?>
<a href ="edit.php" class="btn btn-success">Ajouter</a>

</div>
<?php
require_once('page/footer.php');
?>
