<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/añadirProducto.css">
    <title>Modificar Usuario</title>
</head>
<body>
    <div class="panel">
        <div class="div-panel">
            <h1 class="h1-sesion">Modificar Usuario: <?php echo $nombre ?></h1>    
            <form action="?controlador=usuariosAdmin&action=modificarUsuario" method="post">
                <h3>Nombre</h3>
                <input class="input" type="text" name="Nombre" value="<?php echo $cliente->getNombre() ?>">

                <h3>Apellido</h3>
                <input class="input" type="text" name="Apellido" value="<?php echo $cliente->getApellido() ?>">

                <h3>Mail</h3>
                <input class="input" type="email" name="Correo" value="<?php echo $cliente->getMail() ?>">

                <h3>Rol</h3>
                <select class="input" name="Rol">
                    <option value="Cliente">Cliente</option>
                    <option value="Administrador">Administrador</option>
                </select>
                
                <h3>Contraseña</h3>
                <input class="input" type="password" name="Contraseña" value="<?php echo $cliente->getContra() ?>">

                <input type="hidden" name="cliente_id" value="<?php echo $id ?>">
                <input class="input-boton-sesion" type="submit" value="Modificar Producto">
            </form>
        </div>
    </div>
</body>
</html>