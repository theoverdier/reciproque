<?php
require_once('libs/global.php');
require_once 'page/header.php';

$name = find ('SELECT * FROM photo');

?>

<div id="content">

	<?php
	echo "<img src = 'images/".$name[0]['nom']."'/>"
	?>
	
</div>

<?php
require_once 'page/footer.php';
?>