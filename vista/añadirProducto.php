<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/añadirProducto.css">
    <title>Añadir Producto</title>
</head>
<body>
    <div class="panel">
        <div class="div-panel">
            <h1 class="h1-sesion">Añadir Productos</h1>    
            <form action="?controlador=tablaProductos&action=añadirProducto" method="post">
                <h3>Nombre del producto</h3>
                <input class="input" type="text" name="nombre_producto">

                <h3>Descripción </h3>
                <input class="input" type="text" name="descripcion">

                <h3>Precio </h3>
                <input class="input" type="number" name="precio_unidad" value="1">

                <h3>ID de la categoría </h3>
                <select class="input" name="categoria_id">
                    <?php
                        foreach ($categorias as $categoria) {
                    ?>
                    <option value="<?=$categoria->getCategoriaId();?>"><?=$categoria->getNombreCategoria();?></option>
                    <?php
                        }
                    ?>
                </select>

                <input class="input-boton-sesion" type="submit" value="Añadir Producto">
            </form>
        </div>
    </div>
</body>
</html>