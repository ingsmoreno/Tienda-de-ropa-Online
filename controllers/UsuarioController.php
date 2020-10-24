<?php

require_once 'models/usuario_modelo.php';

class usuarioController
{

    public function index()
    {
        echo "Controlador Usuarios, Acción index";
    }

    public function registro()
    {
        require_once 'views/usuarios/registro.php';
    }

    public function save()
    {
        if ($_POST) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;



            if ($nombre && $apellidos && $email && $password) {

                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
                if ($save) {
                    $_SESSION['register'] = "completed";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "Failed";
        }

        header('Location: ' . base_url . 'usuario/registro');
    }

    public function login()
    {
        if (isset($_POST)) {
            //IDENTIFICAR EL USUARIO
            //CONSULTA A LA BASE DE DATOS
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);


            //CREAR UNA SESSION*/
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida';
            }
        }

        header('location: ' . base_url);
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        //header('location: ' .base_url);
        echo '<script>window.location="'.base_url.'"</script>';
    }
}//fin clase