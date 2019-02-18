<?php
function getDatabase()
{
    try
    {
        $bdd = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    return $bdd;
}

function find($query)
{
    $bdd = getDatabase();
    $response = $bdd->query($query);
    $data = $response->fetchAll();
    $response->closeCursor();
    return $data;
}

function findOne($query)
{
    $bdd = getDatabase();
    $response = $bdd->query($query);
    $data = $response->fetch();
    $response->closeCursor();
    return $data;
}

function executeQuery($query, $arguments = array())
{
    $bdd = getDatabase();
    $req = $bdd->prepare($query);
    $req->execute($arguments);
    return $req;
}

?>
