<?php 
require_once 'models/producto_modelo.php';
class productoController{
    
    public function index(){
    
        //renderizar
        require_once 'views/productos/destacados.php';
    }

    public function gestion(){
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/productos/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();

        $producto = new Producto();

        require_once 'views/productos/crear_producto.php';
    }

    public function save(){
        Utils::isAdmin();

        if (isset($_POST)) {
            var_dump($_POST);
        }
    }
}