<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tienda Online</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/css/estilos.css" type="text/css">
    </head>
<body>
<div id = "container">
    <!-------------------------------------HEADER----------------------------->
        <header id = "header">
            <div id ="logo">
                <img src="assets/images/camiseta.png" alt=""/>
                    <a href="">
                        TIENDA DE CAMISETAS
                    </a>
            </div>  
        </header>
    <!---------------------------------FIN HEADER----------------------------->
    <!-------------------------------------MENU------------------------------->
        <nav id = "menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="">Categoria1</a></li>
                <li><a href="">Categoria2</a></li>
                <li><a href="">Categoria3</a></li>
                <li><a href="">Categoria4</a></li>
                <li><a href="">Carrito</a></li>
            </ul>
        </nav>
    <!---------------------------------FIN MENU------------------------------->

    <!-----------------------------------SIDEBAR------------------------------>
        <div id = "content">
            <aside id = "sidebar">
                <div id = "login" class = "block_aside">
                    <form action = "#" method ="POST" >
                        <h3>Entrar a la web</h3>
                        <label for="email">Email</label>
                        <input type="text" name="email">
                        
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
                        <input type="submit" name="enviar" value="Enviar">
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar Categorias</a></li>
                        <li><a href="#">Gestionar Productos</a></li>
                    </ul>
                </div>
            </aside>
                
        </div>
    <!--------------------------------  FIN SIDEBAR--------------------------->

    <!----------------------------------CAJA PRINCIPAL------------------------>
        <div id = "central">
            <H1>Productos Descatados</H1>
            <div class="product">
                <img src="assets/images/camiseta.png" alt="">
                    <h2>Camiseta Azul</h2>
                        <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/images/camiseta.png" alt="">
                    <h2>Camiseta Azul</h2>
                        <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/images/camiseta.png" alt="">
                    <h2>Camiseta Azul</h2>
                        <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
            </div>        
        </div>
    <!----------------------------------FIN CAJA PRINCIPAL-------------------->

    <!-------------------------------------FOOTER----------------------------->
    <div id= "pie_pagina">
        <footer id ="footer">
        <p>Desarrollado por Saray Moreno &copy;<?=date('yy-m')?></p>
            
        </footer>
        
    </div>
    <!----------------------------------FIN FOOTER---------------------------->   
</div>
</body>
</html>