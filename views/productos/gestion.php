<h1>Gestion de productos</h1>

<!--BOTON DE AGREGAR PRODUCTOS-->
<a href="<?=base_url?>producto/crear" class ="button button-small">
    Agregar producto
</a>

<!--MENSAJES DE ALERTA PARA AGREGAR UN PRODUCTO-->

<?php if (isset($_SESSION['producto']) && $_SESSION['producto']=="Completed") :?>
        <strong class = "alert-green">El producto se agrego correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto']=="Failed") :?>
        <strong class = "alert-red" >Vuelve a cargar los productos</strong> 

<?php endif;?>

<!--BORRAR LA SESION DE ALERTAS AL AGREGAR UN PRODUCTO-->
<?php 
    Utils::deleteSession('producto');
?>


<?php if (isset($_SESSION['producto_delete']) && $_SESSION['producto_delete'] == "Producto eliminado") :?>
    <strong>El producto ha sido eliminado satisfactoriamente</strong>
<?php elseif(isset($_SESSION['producto_delete']) && $_SESSION['producto_delete'] == "Ocurrio un error"):?>
    <strong>Ha ocurrido un error al eliminar el producto</strong>

<?php endif; ?>

<?php Utils::deleteSession('producto_delete');?>


<!--TABLA DE PRODUCTOS-->

    <table> 
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>

        </tr>

    <?php while ($prod_cont = $productos->fetch_object()) :?>
    <tr>
        <td><?=$prod_cont->nombre_prenda;?></td>
        <td><?=$prod_cont->descripcion_producto?></td>
        <td><?=$prod_cont->precio_producto?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$prod_cont->id?>" class= "button">Editar </a> 
            <a href="<?=base_url?>producto/eliminar&id=<?=$prod_cont->id?>" class= "button">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
    
    </table>
    
    
