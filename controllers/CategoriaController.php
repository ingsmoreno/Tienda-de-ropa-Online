<?php 
require_once 'models/categoria_modelo.php';
require_once 'models/producto_modelo.php';

class categoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index_categoria.php';
    }

    public function ver(){
        if (isset($_GET['id'])) {
            //CONSEGUIR TODAS LAS CATEGORIAS
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);

            $categorias = $categoria->getOne();

            //CONSEGUIR LOS PRODUCTOS
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategorias();
        }

        //renderizar
        require_once "views/categoria/ver.php";
    }

    public function crear(){
        utils::isAdmin();

        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();

       //Guardar la categoria
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }

       header('location: '.base_url."categoria/index");
        
    }



}