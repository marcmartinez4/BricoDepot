<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link rel="stylesheet" href="vista/css/css-bd.css">
    <title>Base de Datos Productos</title>
</head>
<body>
    <h1>Tabla de usuarios</h1>
    
    <div class="div-navegacion">
        <form action="?controlador=usuariosAdmin&action=añadir" method="post">
            <input class="btnAñadir" type="submit" value="Añadir Usuario">
        </form>
        <a href="?controlador=tablaProductos" class="btnPedidos">Productos</a>
        <a href="?controlador=usuariosAdmin" class="btnPedidos">Usuarios</a>
    </div>
    
    <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Contraseña</th>
                <th></th>
                <th></th>
            </tr>
            <?php 
                foreach ($clientes as $cliente) {
            ?>
            <tr>
                <td><?php echo $cliente->getCliente_id() ?></td>
                <td><?php echo $cliente->getNombre() ?></td>
                <td><?php echo $cliente->getApellido() ?></td>
                <td><?php echo $cliente->getMail() ?></td>
                <td><?php echo $cliente->getRol() ?></td>
                <td><?php echo $cliente->getContra() ?></td>
                <td>
                    <form action="?controlador=usuariosAdmin&action=modificar" method="post">
                        <input type="hidden" name="cliente_id" value="<?php echo $cliente->getCliente_id(); ?>">
                        <input type="submit" name="Modificar" value="Modificar">
                    </form>
                </td>
            
                <td>
                    <form action="?controlador=usuariosAdmin&action=eliminar" method="post">
                        <input type="hidden" name="cliente_id" value="<?php echo $cliente->getCliente_id (); ?>">
                        <input type="submit" name="Eliminar" value="Eliminar">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
</body>
</html>