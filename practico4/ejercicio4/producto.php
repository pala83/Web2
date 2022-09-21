<?php

require_once 'productocontrolador.php';
function showProductos($def = null){
    require_once 'templates/head.php';
    $controller = new productocontrolador();
    $controller->showProductoNombre();
    require_once 'templates/footer.php';
}


// instancio la clase del controlador


?>