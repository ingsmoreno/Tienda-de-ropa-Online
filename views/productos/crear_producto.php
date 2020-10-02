<h1>Crear nuevos productos</h1>

<div class ="form_container">
<form action = "<?=base_url?>producto/save" method = "POST">
    <label for="nombre">Nombre de producto</label>
    <input type="text" name="nombre" value="">

    <label for="descripcion">Descripcion</label>
    <textarea name ="descripcion"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="">

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="">

    <label for="image">Categorias</label>
        <?php $categorias = Utils::showCategorias();?>
    <select name ="categoria">
        <?php while ($cat = $categorias->fetch_object()) :?>
            <option value ="<?=$cat->id?>">
                <a href="#"><?=$cat->nombre;?></a>
            </option>
        <?php endwhile;?>
    </select>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" value="">

    <input type="submit" name="" value="Guardar">

    
</form>    
</div>
