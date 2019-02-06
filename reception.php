<?php
require_once('libs/global.php');
require_once 'page/header.php';
<<<<<<< HEAD
$name = find ('SELECT * FROM photo');
=======

$name = find ('SELECT * FROM photo');

>>>>>>> 23346c40f525583950c0f2ae19318f9834b399c5
?>

<div id="content">

	<?php
	echo "<img src = 'images/".$name[0]['nom']."'/>"
	?>
	
</div>

<?php
require_once 'page/footer.php';
?>