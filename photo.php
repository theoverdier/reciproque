<?php
require_once('libs/global.php');
require_once 'page/header.php';

$listePhoto = find ('SELECT * FROM photo');

if (isset ($_POST['mon_fichier']) && $_FILES['mon_fichier']['error']) {
  switch ($_FILES['mon_fichier']['error']){
    case 1: // UPLOAD_ERR_INI_SIZE
        echo "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";
        break;
    case 2: // UPLOAD_ERR_FORM_SIZE
        echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
        break;
    case 3: // UPLOAD_ERR_PARTIAL
        echo "L'envoi du fichier a été interrompu pendant le transfert !";
        break;
    case 4: // UPLOAD_ERR_NO_FILE
        echo "Le fichier que vous avez envoyé a une taille nulle !";
        break;
    }
} else {
    
        # code...
        $name = uniqid();
        $extension = strrchr($_FILES['mon_fichier']['name'] ,'.');
        $nom = $_FILES['mon_fichier']['tmp_name'];
        $nomdestination = 'images/'.$name.$extension;
        move_uploaded_file($nom, $nomdestination);
        executeQuery(
            'INSERT INTO photo(nom, current_carnet, userid, current_billet) VALUES(:name, :current_carnet, :userid, :current_billet)',
            array(
                'name' => htmlentities($name.$extension),
                'current_carnet' => $actualCarnet,
                'userid' => htmlentities($_SESSION['userid']),
                'current_billet' => $billet['id']
            )
        );
    
 }
?>

<div id="content">
    <form action="photo.php" method="post" enctype="multipart/form-data">
        <!--<input type="hidden" name="MAX_FILE_SIZE" value="50000">-->
        <label>Votre fichier</label> :
        <input type="file" name="mon_fichier"><br>
        <input type="submit" value="Envoyer">
    </form>

</div>

<?php
require_once 'page/footer.php';
?>