<?php
require_once "producto.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';  //   home/10
if (!empty($_GET['action'])) {
    $action = $_GET['action'];  // action => about/juan
}

$params = explode('/', $action);

switch($params[0]){
    case 'home':
    case 'Escoba':
    case 'Virulana':
    case 'Esponja':
        showProductos();
        //require_once "templates/head.php";
        break;
    default:
        echo "404 no anda, andate";
        break;
}

?>