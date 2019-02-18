<?php
require_once('libs/global.php');
require_once('page/header.php');
checkAccess();

if(isset($_POST['nom']) && isset($_POST['lieu']))
{
    executeQuery(
        'INSERT INTO carnet(nom, lieu, description, userid) VALUES(:nom, :lieu, :description, :userid)',
        array(
            'nom' => htmlentities($_POST['nom']),
            'lieu' => htmlentities($_POST['lieu']),
            'description' => htmlentities($_POST['description']),
            'userid' => htmlentities($_SESSION['userid'])
        )
    );
    header('location: admin.php');
}

?>
<div class="container">
    <form method="post" action="edit.php">
        <h2>Créer un carnet</h2>
        <input type="hidden" name="id" value="">
        <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autofocus value=""><br>
        <input type="text" name="lieu" class="form-control" placeholder="Lieu" required="required" value=""><br>
        <textarea name="description" placeholder="Description" class="form-control"></textarea><br>
        <a href="admin.php" class="btn btn-lg btn-danger">Annuler</a>
        <button class="btn btn-lg btn-primary" type="submit">Valider</button>
    </form>
</div>
<?php
require_once('page/footer.php');
?>
