<?php
require_once('libs/global.php');
require_once('page/header.php');

$error = false;
$lastLogin = '';

if(isset($_POST['login']) && isset($_POST['mdp']))
{
	$sLogin = htmlentities($_POST['login']);
    $sMdp = htmlentities($_POST['mdp']);
    $user = findOne('SELECT * FROM user WHERE login="'.$sLogin.'" AND mdp="'.$sMdp.'"');
    echo $user;
	if ($user != false)
	{
		$_SESSION['userid'] = $user['userid'];
		header('Location: admin.php');
	}
	else
	{
		$error = true;
        $lastLogin = $_POST['login'];
	}
}

?>
<div class="container">
    <form method="post" action="login.php" class="formLogin">
        <h2>Connexion</h2>
        <input type="text" name="login" class="form-control" placeholder="login" required="required" autofocus value="<?php echo $lastLogin; ?>">
        <input type="password" name="mdp" class="form-control" placeholder="mdp" required="required">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
        <a href="editUser.php">Inscrivez-vous</a>
        <?php
            if ($error){
                showErrorMessage('inscrivez-vous');
            }
        ?>
    </form>
</div>
<?php
require_once('page/footer.php');
?>
