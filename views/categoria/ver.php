<?php if (isset($categorias)) :?>
<h1><?=$categorias->nombre?></h1>
<?php  if ($productos->num_rows == 0):?>
    <p>No hay productos para mostrar</p>
<?php else:?>
    <?php while ($product = $productos->fetch_object()):?>
        <div class="product">
            <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
                <?php if ($product->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
                <?php else: ?>
                    <img src="<?=base_url?>assets/images/camiseta.png" />
                <?php endif;?>
                <h2><?=$product->nombre_prenda?></h2>
            </a>
                <p><?=$product->precio_producto?></p>
                    <a href="<?=base_url?>producto/ver&id=<?=$product->id?>" class="button">Comprar</a>
        </div>
    <?php endwhile;?>
    <?php endif;?>
<?php else :?>
        <h1>La categoria no existe</h1>
<?php endif;?>