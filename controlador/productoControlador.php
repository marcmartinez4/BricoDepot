<?php
    include_once 'modelo/ProductoDAO.php';
    
    class productoControlador {
        public static function index() {
            $productos = ProductoDAO::getAllProducts();
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre del Producto</th><th>Descripción</th><th>Precio por Unidad</th><th>Categoría</th><th></th><th></th></tr>";
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>".$nombres_productos[] = $producto->getProducto_id()."</td>";
                echo "<td>".$nombres_productos[] = $producto->getNombre_producto()."</td>";
                echo "<td>".$nombres_productos[] = $producto->getDescripcion()."</td>";
                echo "<td>".$nombres_productos[] = $producto->getPrecio_unidad()." €</td>";
                echo "<td>".$nombres_productos[] = $producto->getCategoria_id()."</td>";
                echo "<td><input type='submit' name='Añadir' value='Añadir'></td>";
                echo "<td><input type='submit' name='Eliminar' value='Eliminar'></td>";
                echo "</tr>";
            }
            echo "</table>";
            return $nombres_productos;
        }
    }
?>
