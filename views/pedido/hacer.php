<?php
if (isset($_SESSION['identity'])):?>

    <h1>Realizar pedido</h1>
    <p>
        <a href="<?=base_url?>carrito/index">Volver al carrito</a>
    </p>
    <br>
    <h3>Completa tus datos</h3>
    <form action ="<?=base_url.'pedido/add'?>" method = "POST">
    <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required>
    <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" required>
    <label for="direccion">Direccion</label>
        <input type="text" name="direaccion" required>

        <input type="submit" name="" value="Confirmar pedido">
        
    </form>


<?php else:?>
    <h1>Debes estar identificado</h1>
    <p>Debes estar loggeado en la web para realizar el pedido.</p>
<?php endif?>