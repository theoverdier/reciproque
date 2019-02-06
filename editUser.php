<?php
require_once('libs/global.php');
require_once('page/header.php');
// checkAccess();

if(isset($_POST['login']) && isset($_POST['mdp']))
{
    executeQuery(
        'INSERT INTO user(login, mdp) VALUES(:login, :mdp)',
        array(
            'login' => htmlentities($_POST['login']),
            'mdp' => htmlentities($_POST['mdp'])
        )
    );
    header('location: login.php');
}

?>
<div class="container">
    <form method="post" action="editUser.php">
        <h2>Créer un compte</h2>
        <input type="hidden" name="userID" value="">
        <input type="text" name="login" class="form-control" placeholder="login" required="required" autofocus value=""><br>
        <input type="text" name="mdp" class="form-control" placeholder="mdp" required="required" value=""><br>
        <a href="login.php" class="btn btn-lg btn-danger">Annuler</a>
        <button class="btn btn-lg btn-primary" type="submit">Valider</button>
    </form>
</div>
<?php
require_once('page/footer.php');
?>
