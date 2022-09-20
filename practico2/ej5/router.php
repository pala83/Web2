<?php

require_once 'tabla.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'tabla';  //   tabla/10
if (!empty($_GET['action'])) {
    $action = $_GET['action'];  // action => about/juan
}

$params = explode('/', $action);

switch($params[0]){
    case 'tabla':
        if(empty($params[1])){
            showTabla();
        }
        else{
            showTabla($params[1]);
        }
        break;
    default:
        echo "404 no anda, andate";
        break;
}

?>