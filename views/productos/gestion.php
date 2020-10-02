<h1>Gestion de productos</h1>

<a href="<?=base_url?>producto/crear" class ="button button-small">
    Agregar producto
</a>

    <table> 
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>

    <?php while ($prod_cont = $productos->fetch_object()) :?>
        <td><?=$prod_cont->nombre_prenda;?></td>
        <td><?=$prod_cont->descripcion_producto?></td>
        <td><?=$prod_cont->precio_producto?></td>

    <?php endwhile; ?>
    
    </table>
    
    
