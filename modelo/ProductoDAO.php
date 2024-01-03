<?php
    // Se incluyen los archivos necesarios
    include_once 'modelo/Producto.php';
    include_once 'config/dataBase.php';
    include_once 'config/functions.php';
    include_once 'modelo/Pedido.php';
    include_once 'modelo/PedidoProductos.php';
    
    // Se define la clase
    class productoDAO {

        // Método para obtener todos los productos
        public static function getAllProducts() {
            $con = dataBase::connect();
                
            if ($result = $con->query("SELECT * FROM productos")) {    
                $productos = array();
                    
                while ($producto = $result->fetch_object('Producto')) {
                    $productos[] = $producto;
                }
                return $productos;
            }
        }

        // Método para obtener un producto por su ID
        public static function getProductById($id) {
            $con = database::connect();
            $result = $con->query("SELECT * FROM `productos` WHERE `producto_id` = $id;");
            $prodCarrito = $result->fetch_object('Producto');
            return $prodCarrito;
        }

        // Método para añadir un nuevo producto
        public static function añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id) {
            $con = dataBase::connect();
            $con->query("INSERT INTO productos (`nombre_producto`, `descripcion`, `precio_unidad`, `categoria_id`) VALUES ('$nombre_producto', '$descripcion', '$precio_unidad', '$categoria_id')");
        }

        // Método para eliminar un producto por su ID
        public static function eliminarProducto($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `productos` WHERE producto_id = $id;");
        }

        // Método para modificar un producto
        public static function modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            $con = dataBase::connect();
            $con->query("UPDATE productos SET `nombre_producto` = '$nombre_producto', `descripcion` = '$descripcion', `precio_unidad` = '$precio_unidad', `categoria_id` = '$categoria_id' WHERE `producto_id` = '$id'");
        }

        // Método para obtener todos los pedidos
        public static function getAllPedidos() {
            $con = dataBase::connect();
                
            if ($result = $con->query("SELECT * FROM pedidos")) {    
                $pedidos = array();
                    
                while ($pedido = $result->fetch_object('Pedido')) {
                    $pedidos[] = $pedido;
                }
                return $pedidos;
            }
        } 
        
        // Método para eliminar un pedido por su ID (¡Ojo! Esto parece estar eliminando productos, no pedidos)
        public static function eliminarPedido($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `productos` WHERE producto_id = $id;");
        }

        // Método para modificar un pedido (¡Ojo! Esto parece estar modificando productos, no pedidos)
        public static function modificarPedido($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            $con = dataBase::connect();
            $con->query("UPDATE productos SET `nombre_producto` = $nombre_producto, `descripcion` = $descripcion, `precio_unidad` = $precio_unidad,`categoria_id` = $categoria_id WHERE producto_id = $id");
        }
    }
?>
