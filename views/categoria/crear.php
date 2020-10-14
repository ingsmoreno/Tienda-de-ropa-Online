<h1>Crear Categoria</h1>

<form action = "<?=base_url?>categoria/save" method = "POST">
    <label for="nombre">Nombre de la categoria</label>
    <input type="text" name="nombre" value="" required>

    <input type="submit" value="Guardar">
</form>