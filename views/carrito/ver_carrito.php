<h1>Carrito de compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito'])>=1):?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>
    </tr>

    <?php foreach ($carrito as $indice => $elemento) :
        $producto = $elemento['producto'];
    ?>
        <tr>
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
               <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button button-updown">-</a> <?= $elemento['unidades'] ?> <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button button-updown">+</a>
            </td>
            <td>
                <a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="button">Eliminar</a>
            </td>

        </tr>
    <?php endforeach; ?>
</table>
<br>

<div class= "button-borrar">
<a href="<?=base_url?>carrito/delete_all" class ="button  button-pedido">Borrar todo</a>
</div>

<div class="total-carrito">
    <?php $stats = Utils::stadCarrito(); ?>
    <h3>Precio total:<?= $stats['total']; ?> $</h3>

    <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>
<?php else: ?>

    <p>El carrito esta vacio, añade algun producto</p>
<?php endif?>