<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tienda Online</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?=base_url?>assets/css/estilos.css" type="text/css">
    </head>
<body>
<div id = "container">
    <!-------------------------------------HEADER----------------------------->
        <header id = "header">
            <div id ="logo">
                <img src="<?=base_url?>assets/images/camiseta.png" alt=""/>
                    <a href="">
                        TIENDA DE CAMISETAS
                    </a>
            </div>  
        </header>
    <!---------------------------------FIN HEADER----------------------------->
    <!-------------------------------------MENU------------------------------->
        <?php $categorias = Utils::showCategorias() ?>
        <nav id = "menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <?php while ($cat = $categorias->fetch_object()) :?>
                    <li><a href="#"><?=$cat->nombre;?></a></li>
                <?php endwhile;?>
            </ul>
        </nav>
    <!---------------------------------FIN MENU------------------------------->

    <!-----------------------------------SIDEBAR------------------------------>
        <div id = "content">