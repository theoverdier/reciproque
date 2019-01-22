<?php
require_once('libs/global.php');
require_once('page/header.php');
// checkAccess();
$actualCarnet = $_GET['addto'];
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
    header('location: adminBillet.php');
}

?>
<div class="container">
<?php
   echo '<form method="post" action="editBillet.php?addto=' .$actualCarnet. '">'
?>
        <h2>Créer un billet</h2>
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
