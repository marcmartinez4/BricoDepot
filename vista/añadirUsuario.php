<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/añadirProducto.css">
    <title>Añadir Usuario</title>
</head>
<body>
    <div class="panel">
        <div class="div-panel">
            <!-- Título de la página -->
            <h1 class="h1-sesion">Añadir Usuario</h1>
            <!-- Form con los datos a rellenar para añadir un usuario -->
            <form action="?controlador=usuariosAdmin&action=añadirCliente" method="post">
                <h3>Nombre</h3>
                <input class="input" type="text" name="Nombre">

                <h3>Apellido</h3>
                <input class="input" type="text" name="Apellido">

                <h3>Mail</h3>
                <input class="input" type="email" name="Correo">

                <h3>Rol</h3>
                <!-- Select con las categorias de usuario que existen -->
                <select class="input" name="Rol">
                    <option value="Cliente">Cliente</option>
                    <option value="Administrador">Administrador</option>
                </select>
                
                <h3>Contraseña</h3>
                <input class="input" type="password" name="Contraseña">
                
                <!-- Input para crear el usuario -->
                <input class="input-boton-sesion" type="submit" name="Añadir" value="Añadir Usuario">
            </form>
        </div>
    </div>
</body>
</html>