
<H1>Algunos de nuestros productos</H1>

<?php while ($product = $productos->fetch_object()):?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
            <?php if ($product->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
            <?php else: ?>
                <img src="<?=base_url?>assets/images/camiseta.png" />
            <?php endif;?>
            <h2><?=$product->nombre_prenda?></h2>
        
                <p><?=$product->precio_producto?></p>
                <a href="<?=base_url?>producto/ver&id=<?=$product->id?>" class="button">Comprar</a>
                
            </a>
    </div>
<?php endwhile;?>


           

        