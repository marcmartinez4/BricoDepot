<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/añadirProducto.css">
    <title>Modificar Producto</title>
</head>
<body>
    <div class="panel">
        <div class="div-panel">
            <h1 class="h1-sesion">Modificar Producto: <?= $id ?></h1>    
            <form action="?controlador=tablaProductos&action=modificarProducto" method="post">
                <h3>Nombre del producto</h3>
                <input class="input" type="text" name="nombre_producto" value="<?=$producto->getNombre_producto();?>">

                <h3>Descripción </h3>
                <input class="input" type="text" name="descripcion" value="<?=$producto->getDescripcion();?>">

                <h3>Precio </h3>
                <input class="input" type="number" name="precio_unidad" value="<?=$producto->getPrecio_unidad();?>">

                <select class="input" name="categoria_id">
                    <?php
                        foreach ($categorias as $categoria) {
                    ?>
                    <option value="<?=$categoria->getCategoriaId();?>"><?=$categoria->getNombreCategoria();?></option>
                    <?php
                        }
                    ?>
                </select>

                <input type="hidden" name="producto_id" value="<?=$id?>">
                <input class="input-boton-sesion" type="submit" value="Modificar Producto">
            </form>
        </div>
    </div>
</body>
</html>