<?php
require_once('libs/global.php');
require_once 'header.php';
?>

<div id="content">
	<nav class="navbar fixed-top navbar-expand-sm">
        <a class="navbar-brand" href="index.php">MyGiftList</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="admin.php">Administration</a></li>
        <?php
        if (isLoggedIn()==true)
        {
            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Se déconnecter</a></li>';
        }  
        ?>


            </ul>
        </div>
    </nav>
</div>

<?php
require_once 'footer.php';
?>