<?php
require_once('libs/global.php');
// checkAccess();

if(isset($_POST['Titre']) && isset($_POST['Artiste']))
{
    executeQuery(
        'INSERT INTO billet(Titre, Artiste, Description) VALUES(:Titre, :Artiste, :Description)',
        array(

            // '$_GET['addto']' => htmlentities($_POST['nomCarnet']),
            'Titre' => htmlentities($_POST['Titre']),
            'Artiste' => htmlentities($_POST['Artiste']),
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
        <input type="text" name="Titre" class="form-control" placeholder="Titre" required="required" autofocus value=""><br>
        <input type="text" name="Artiste" class="form-control" placeholder="Artiste" required="required" value=""><br>
        <textarea name="Description" placeholder="Description" class="form-control"></textarea><br>
        <a href="admin.php" class="btn btn-lg btn-danger">Annuler</a>
        <button class="btn btn-lg btn-primary" type="submit">Valider</button>
    </form>
</div>
<?php
require_once('page/footer.php');
?>
