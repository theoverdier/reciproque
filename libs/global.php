<?php
session_start();

require_once('libs/config.php');
require_once('libs/sql.php');

function isLoggedIn()
{
    return isset($_SESSION['userid']) && !empty($_SESSION['userid']);
}

function checkAccess()
{
    if(!isLoggedIn())
    {
        header('Location: login.php');
        die();
    }
}

function showErrorMessage($message)
{
    echo '<div class="alert alert-danger">'.$message.'</div>';
}
?>
