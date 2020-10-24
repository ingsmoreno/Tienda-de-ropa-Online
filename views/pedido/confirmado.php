<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == "completed") : ?>
    <h1>Pedido confirmado</h1>
    <p>Tu perdido ha sido guardado con exito</p>
    <br>
    <?php if (isset($pedido)) : ?>
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
        <div class="total-carrito">
            <h3>Total a pagar: <?= $pedido->coste ?></h3>
        </div>
    <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == "Failed") : ?>
    <h1>Tu pedido no se ha realizado</h1>
<?php endif; ?>