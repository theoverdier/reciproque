<?php
require_once('libs/global.php');
// checkAccess();

if(isset($_POST['Nom']) && isset($_POST['Lieu']))
{
    executeQuery(
        'INSERT INTO carnet(Nom, Lieu, Description) VALUES(:Nom, :Lieu, :Description)',
        array(
            'Nom' => htmlentities($_POST['Nom']),
            'Lieu' => htmlentities($_POST['lieu']),
            'Description' => htmlentities($_POST['Description'])
        )
    );
    header('location: admin.php');
}


require_once('page/header.php');
?>
<div class="container">
    <form method="post" action="edit.php">
        <h2>Créer un carnet</h2>
        <input type="hidden" name="id" value="">
        <input type="text" name="Nom" class="form-control" placeholder="Nom" required="required" autofocus value=""><br>
        <input type="text" name="Lieu" class="form-control" placeholder="Lieu" required="required" value=""><br>
        <textarea name="Description" placeholder="Description" class="form-control"></textarea><br>
        <a href="admin.php" class="btn btn-lg btn-danger">Annuler</a>
        <button class="btn btn-lg btn-primary" type="submit">Valider</button>
    </form>
</div>
<?php
require_once('page/footer.php');
?>
