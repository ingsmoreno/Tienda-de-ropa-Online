
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
                <?php 
                    if (isset($_SESSION['admin'])) :?>
                        <li><a href="<?=base_url?>categoria/crear">Gestionar Categorias</a></li>
                        <li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
                        <li><a href="#">Gestionar Pedidos</a></li>

                <?php endif;?>

                <?php 
                    if (isset($_SESSION['identity'])) :?>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="<?=base_url?>usuario/logout">Cerrar sesion</a></li>
                    <?php else:?>
                        <a href="<?=base_url?>usuario/registro" >Registrate aquí</a>
                <?php endif;?>
                </ul>
     </div>
</aside>
        <!--------------------------------  FIN SIDEBAR--------------------------->

        <!----------------------------------CAJA PRINCIPAL------------------------>
<div id = "central">