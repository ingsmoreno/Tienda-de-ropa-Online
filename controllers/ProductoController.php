<?php 
require_once 'models/producto_modelo.php';
class productoController{
    
    public function index(){
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        //renderizar
        require_once 'views/productos/destacados.php';
    }

    public function ver(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();
            
        }
        require_once 'views/productos/ver_producto.php';
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
                
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; 
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false; 
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false; 
                $categoria = isset($_POST['categorias']) ? $_POST['categorias'] : false;
                //$imagen = isset($_POST['imagen']) ? ($_POST['imagen']) : false ; 
                
            
                if ($nombre && $descripcion && $precio && $stock && $categoria) {
                    $productos = new Producto();
                    $productos->setNombre($nombre);
                    $productos->setDescripcion($descripcion);
                    $productos->setPrecio($precio);
                    $productos->setStock($stock);
                    $productos->setCategoria_id($categoria);

                    //Guardar la imagen 
                    if (isset($_FILES['imagen'])) {
                        $file = $_FILES['imagen'];
                        $filename = $file['name'];
                        $mimetype = $file['type'];
    
                        if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif" || $mimetype == "image/bmp" || $mimetype == "image/webpg") {
                            
                            
                            if (!is_dir('uploads/images')) {
                                mkdir('uploads/images', 0777, true);
                            }

                            $productos->setImagen($filename);
                            move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                            
                        }
                    }
                       
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $productos->setId($id);

                            $save = $productos->edit();
                        }else {
                            $save = $productos->save();
                        }
    
                    if($save) {
                        $_SESSION['producto'] = "Completed";
                    } else {
                        $_SESSION['producto'] = "Failed";
                    }
                    
                }else {
                    $_SESSION['producto'] = "Failed";
                }
            } else {
                $_SESSION['producto'] = "Failed";
            }
           header('location: '.base_url.'producto/gestion'); 
    } 

    public function editar(){
    Utils::isAdmin();
    
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();

            require_once 'views/productos/crear_producto.php';
        } else {
            header('location: '.base_url.'producto/gestion');
        }

    }

    public function eliminar(){
        Utils::isAdmin();
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $producto_delete = $producto->delete();

            if ($producto_delete) {
                $_SESSION['producto_delete'] = "Producto eliminado";
            }else {
                $_SESSION['producto_delete'] = "Ocurrio un error";
            }

           
        }else {
            $_SESSION['producto_delete'] = "Ocurrio un error";
        }
            header('location: '.base_url.'producto/gestion');

    } 

}