<?php 
require_once 'models/categoria_modelo.php';

class categoriaController{

    public function index(){
        Utils::isAdmin();

        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index_categoria.php';
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