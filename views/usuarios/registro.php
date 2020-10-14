<h1>Registrarse</h1>

<!---MENSAJES DE ALERTA DE REGISTRO-->
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'completed' ):?> 
    <strong class = "alert-green">Registro completado correctamente</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed' ):?>
    <strong class = "alert-red">Registro fallido, introduce bien los datos</strong>

<?php endif;?>

<!---BORRAR LA SESION-->
<?php 

Utils::deleteSession('register');

?>

<!---FORMULARIO DE REGISTRO-->

<form action ="<?=base_url?>usuario/save" method = "POST">
    
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"  required>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellido"  required>

    <label for="email">Email:</label>
    <input type="email" name="email"  required>

    <label for="password">Password:</label>
    <input type="password" name="password"  required>

    <input type="submit" name="" value="Registrarse">

    
</form>