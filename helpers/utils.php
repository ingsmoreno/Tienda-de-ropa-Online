<?php

class Utils
{
    public static function deleteSession($name)
    {

        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header('location: ' . base_url);
        } else {
            return true;
        }
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header('location: ' . base_url);
        } else {
            return true;
        }
    }

    public static function showCategorias()
    {
        require_once 'models/categoria_modelo.php';

        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function stadCarrito()
    {
        $stad = array(
            'count' => 0,
            'total' => 0
        );

        if (isset($_SESSION['carrito'])) {
            $stad['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as  $producto)
                $stad['total'] += $producto['precio'] * $producto['unidades'];
        }

        return $stad;
    }

    public static function showStatus($status) {
        $value = 'pendiente';
        if ($status == 'pending') {
            $value = 'Pendiente';
        }elseif($status == 'preparing'){
            $value = 'Preparando';
        }elseif($status == 'ready'){
            $value = 'Preparado para enviar';
        }elseif($status == 'confirm'){
            $value = 'Enviado';
        }

        return $value;
    }

}