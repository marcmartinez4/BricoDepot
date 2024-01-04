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
            <h1 class="h1-sesion">Modificar Usuario: <?=$nombre?></h1>    
            <form action="?controlador=usuariosAdmin&action=modificarUsuario" method="post">
                <h3>Nombre</h3>
                <input class="input" type="text" name="Nombre" value="<?=$cliente->getNombre();?>">

                <h3>Apellido</h3>
                <input class="input" type="text" name="Apellido" value="<?=$cliente->getApellido();?>">

                <h3>Mail</h3>
                <input class="input" type="email" name="Correo" value="<?=$cliente->getMail();?>">

                <h3>Rol</h3>
                <select class="input" name="Rol">
                    <option value="Cliente">Cliente</option>
                    <option value="Administrador">Administrador</option>
                </select>
                
                <h3>Contraseña</h3>
                <input class="input" type="password" name="Contraseña" value="<?=$cliente->getContra();?>">

                <input type="hidden" name="cliente_id" value="<?=$id?>">
                <input class="input-boton-sesion" type="submit" value="Modificar Usuario">
            </form>
        </div>
    </div>
</body>
</html>