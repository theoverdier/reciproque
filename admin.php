<?php
require_once('libs/global.php');
require_once('page/header.php');

checkAccess();

if(isset($_GET['suppr']))
{
    executeQuery('DELETE FROM carnet WHERE id = :id AND userid = :userid',
        array(
        	'id' => $_GET['suppr'],
        	'userid' => $_SESSION['userid']
        )
    );
}

$list = find ('SELECT * FROM carnet WHERE userid="'.$_SESSION['userid'].'"');
?>
<div class="container">
	<h1>Ma liste de carnet</h1><hr>
	<?php
		foreach($list as $carnet)
		{
			echo '<div class="alert alert-primary" role="alert"><b>' . '<a href="adminBillet.php?goto='. $carnet['nom'] .'" class="btn btn-danger">consulter carnet</a>' . '</b> ' . $carnet['lieu'] . '</b> ' .$carnet['description'] . '<a href="admin.php?suppr=' . $carnet['id'] .'" class="btn btn-danger">X</a></div>';
		}
	?>
	<a href="edit.php" class="btn btn-success">Ajouter un carnet</a>
</div>
<?php
require_once('page/footer.php');
?>
