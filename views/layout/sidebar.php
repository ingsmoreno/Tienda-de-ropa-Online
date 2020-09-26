
<aside id = "sidebar">
    <div id = "login" class = "block_aside">
        <?php if (!isset($_SESSION['identity'])): ?>
            <h3>Entrar a la web</h3>
                <form action = "<?=base_url?>usuario/login" method ="POST" >
                        <label for="email">Email</label>
                        <input type="email" name="email">
                                    
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
                        <input type="submit" name="enviar" value="Enviar">
                </form>
        <?php else:?>
            <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <?php endif;?>
            <ul>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="#">Gestionar Categorias</a></li>
                <li><a href="#">Gestionar Productos</a></li>
                <li><a href="<?=base_url?>usuario/logout">Cerrar sesion</a></li>
                </ul>
     </div>
</aside>
        <!--------------------------------  FIN SIDEBAR--------------------------->

        <!----------------------------------CAJA PRINCIPAL------------------------>
<div id = "central">