<aside id="sidebar">

    <div id="carrito" class="block_aside">
        <h3>Mi carrito</h3>

        <ul>
            <?php $stats = Utils::stadCarrito(); ?>
            <li><a href="<?= base_url ?>carrito/index">Productos(<?= $stats['count']; ?>)</a></li>
            <li><a href="<?= base_url ?>carrito/index">Total: <?= $stats['total']; ?> $</a></li>
            <li><a href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
        </ul>

    </div>

    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
            <h3>Entrar a la web</h3>
            <form action="<?= base_url ?>usuario/login" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" name="enviar" value="Enviar">
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>

        <ul>
            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="<?= base_url ?>categoria/crear">Gestionar Categorias</a></li>
                <li><a href="<?= base_url ?>producto/gestion">Gestionar Productos</a></li>
                <li><a href="<?= base_url ?>pedido/gestion">Gestionar Pedidos</a></li>

            <?php endif; ?>

            <?php if (isset($_SESSION['identity'])) : ?>
                <li><a href="<?=base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>usuario/logout">Cerrar sesion</a></li>
            <?php else : ?>
                <a href="<?= base_url ?>usuario/registro" class="registro">Registrate aquí</a>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<!--------------------------------  FIN SIDEBAR--------------------------->

<!----------------------------------CAJA PRINCIPAL------------------------>
<div id="central">