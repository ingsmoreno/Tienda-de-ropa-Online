<?php if (isset($edit) && isset($pro) && is_object($pro) ):?>
    <h1>Editar producto <?=$pro->nombre_prenda?></h1>
    <?php $url_action = base_url."producto/save&id=".$pro->id;
    ?>

<?php else:?>
    <h1>Crear nuevos productos</h1>
    <?php $url_action = base_url.'producto/save';?>
<?php endif; ?>

<!---FORMULARIO DE CREAR Y EDITAR PRODUCTOS-->

<div class ="form_container">
    
    
    <form action = "<?=$url_action?>" method = "POST" enctype = "multipart/form-data">
        <label for="nombre">Nombre de producto</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre_prenda : '';?> " >

        <label for="descripcion">Descripcion</label>
        <textarea name ="descripcion"><?=isset($pro) && is_object ($pro) ? $pro->descripcion_producto : '';?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?=isset($pro) && is_object ($pro) ? $pro->precio_producto : '';?> ">

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object ($pro) ? $pro->stock_producto : '' ;?>">

        <label for="categorias">Categorias</label>
            <?php $categorias = Utils::showCategorias();?>
        <select name ="categorias">
            <?php while ($cat = $categorias->fetch_object()) :?>
                <option value ="<?=$cat->id?>" <?=isset($pro) && is_object ($pro) && $cat->id == $pro->categoria_id ? 'selected' : '';?>>
                    <a href="#"><?=$cat->nombre;?></a>
                </option>
            <?php endwhile;?>
        </select>

        <label for="imagen">Imagen</label>
            <?php if(isset($pro) && is_object ($pro) && !empty($pro->imagen)) : ?>  
                <img src= "<?=base_url?>uploads/images/<?=$pro->imagen?>" class ="thumb">
            <?php endif;?>
        <input type="file" name="imagen" >

        <input type="submit" name="" value="Guardar">

        
    </form>    
</div>