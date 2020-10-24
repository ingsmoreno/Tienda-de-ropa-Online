<h1>Detalles del pedido</h1>

<?php if (isset($pedido)) :?>
        <h3>Datos del pedido</h3>
        Numero de pedido: <?= $pedido->id ?> <br>
        Productos:
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <tr>
                <?php while ($producto = $productos->fetch_object()) : ?>

                    <td>
                        <?php if ($producto->imagen != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img-carrito" />
                        <?php else : ?>
                            <img src="<?= base_url ?>assets/images/camiseta.png" class="img-carrito" />
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>" class="enlace-carrito"><?= $producto->nombre_prenda ?></a>
                    </td>
                    <td>
                        <?= $producto->precio_producto ?>
                    </td>
                    <td>
                        <?= $producto->unidades ?>
                    </td>

            </tr>

        <?php endwhile; ?>
</table>
<br>
<div class ="estado-pedido">
<?php if (isset($_SESSION['admin'])) :?>
    <h3>Cambiar estado de pedido</h3>
        <form action= "<?=base_url?>pedido/estado" method = "POST" >
        <input type="hidden" name="pedido_id" value="<?=$pedido->id?>">
            <select name = "estado">
                <option value="pending"<?=$pedido->estado_de_pedido == "pending" ? 'selected' : '' ?>>Pendiente</option>
                <option value="preparing"<?=$pedido->estado_de_pedido == "preparing" ? 'selected' : '' ?> >Preparando</option>
                <option value="ready" <?=$pedido->estado_de_pedido == "ready" ? 'selected' : '' ?>>Preparado para enviar</option>
                <option value="confirm" <?=$pedido->estado_de_pedido == "confirm" ? 'selected' : '' ?>>Enviado</option>
            </select>

            <input type="submit" class= "button-estado" value="Cambiar estado">
        </form>
<?php endif;?>
<br>
<h3>Estado de pedido: <?= Utils::showStatus($pedido->estado_de_pedido); ?> </h3>
</div>

<br>

<h3>Direccion de envío:</h3>
Provincia: <?=$pedido->provincia?><br>
Localidad: <?=$pedido->localidad?><br>
Direccion: <?=$pedido->direccion?><br>
    <?php endif; ?>