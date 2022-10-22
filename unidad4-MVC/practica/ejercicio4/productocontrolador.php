<?php
require_once 'productomodelo.php';
require_once 'productovista.php';
class productocontrolador{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new productomodelo();
        $this->view = new productovista();
    }
    function showProductoNombre() {
        // verifica datos obligatorios
        if (!isset($_GET['action']) || empty($_GET['action'])) {
            $this->view->renderError();
            return;
        }
        // obtiene el genero enviado por GET
        $nombre = $_GET['action'];
        // obtengo las peliculas del modelo
        $productos = $this->model->getProductoNombre($nombre);
        // actualizo la vista
        $this->view->renderProducto($nombre, $productos);
    }
}

?>