<?php
require_once('libs/global.php');
require_once('page/header.php');
// checkAccess();
$actualCarnet = $_GET['addto'];
if(isset($_POST['titre']) && isset($_POST['artiste']))
{
    echo $actualCarnet;
    executeQuery(
        'INSERT INTO billet(titre, artiste, description, carnet_id, userid) VALUES(:titre, :artiste, :description, :carnet_id, :userid)',
        array(
            // '$_GET['addto']' => htmlentities($_POST['nomCarnet']),
            'titre' => htmlentities($_POST['titre']),
            'artiste' => htmlentities($_POST['artiste']),
            'description' => htmlentities($_POST['description']),
            'carnet_id' => htmlentities($_POST['carnet_id']),
            'userid' => htmlentities($_SESSION['userid'])
        )
    );
    header('location: adminBillet.php?goto='.$actualCarnet);
}

?>
<div class="container">
<?php
   echo '<form method="post" action="editBillet.php?addto=' .$actualCarnet. '">'
?>
        <h2>Créer un billet</h2>
        <input type="hidden" name="id" value="">
        <input type="hidden" name="carnet_id" value="<?php echo $actualCarnet; ?>">
        <input type="text" name="titre" class="form-control" placeholder="Titre" required="required" autofocus value=""><br>
        <input type="text" name="artiste" class="form-control" placeholder="Artiste" required="required" value=""><br>
        <textarea name="description" placeholder="Description" class="form-control"></textarea><br>
        <a href="adminBillet.php?goto=<?php echo $actualCarnet ?>" class="btn btn-lg btn-danger">Annuler</a>
        <button class="btn btn-lg btn-primary" type="submit">Valider</button>
    </form>
</div>
<?php
require_once('page/footer.php');
?>
