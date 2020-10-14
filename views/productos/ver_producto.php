<?php if (isset($pro)) :?>
    <h1><?=$product = $pro->nombre_prenda?></h1>
    <div class ="detail-product"> 
        <?php if ($pro->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" />
            <?php else: ?>
                    <img src="<?=base_url?>assets/images/camiseta.png" />
            <?php endif;?>
            <div class= "data">
                <p class="descripcion"><?=$pro->descripcion_producto?></p>
                <p class="precio"><?=$pro->precio_producto?>$</p>
                <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
            </div>
    </div>
    <?php else :?>
            <h1>El producto no existe</h1>
<?php endif;?>