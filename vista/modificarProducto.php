<?php
    include_once 'config/dataBase.php';
    include_once 'modelo/productoDAO.php';
    include_once 'controlador/productoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/añadirProducto.css">
    <title>Modificar Productos</title>
</head>
<body>
    <div class="panel">
        <div class="div-panel">
            <h1 class="h1-sesion">Modificar Producto: <?php echo $id ?></h1>    
            <form action="" method="post">
                <h3>Nombre del producto</h3>
                <input class="input" type="text" name="nombre_producto" placeholder="<?php echo $producto->getNombre_producto() ?>">

                <h3>Descripción </h3>
                <input class="input" type="text" name="descripcion" placeholder="<?php echo $producto->getDescripcion() ?>">

                <h3>Precio </h3>
                <input class="input" type="number" name="precio_unidad" placeholder="<?php echo $producto->getPrecio_unidad() ?> €">

                <h3>ID de la categoría </h3>
                <input class="input" type="number" name="categoria_id" placeholder="<?php echo $producto->getCategoria_id() ?>">

                <input class="input-boton-sesion" type="submit" value="Modificar Producto">
            </form>
        </div>
    </div>
    <?php
        if (!empty($_POST['nombre_producto']) && !empty($_POST['descripcion']) && !empty($_POST['precio_unidad']) && !empty($_POST['categoria_id']) && !empty($id)) {
            $nombre_producto = $_POST['nombre_producto']; 
            $descripcion = $_POST['descripcion'];
            $precio_unidad = $_POST['precio_unidad'];
            $categoria_id = $_POST['categoria_id'];
            
            productoControlador::modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id);
        }     
    ?>
</body>
</html>