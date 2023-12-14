<?php
    include_once 'modelo/Producto.php';
    include_once 'config/dataBase.php';
    include_once 'config/functions.php';
    include_once 'modelo/Pedido.php';
    include_once 'modelo/PedidoProductos.php';

    class productoDAO {
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

        public static function getProductById($id) {
            $con = database::connect();
            $result = $con->query("SELECT * FROM `productos` WHERE `producto_id` = $id;");
            $prodCarrito = $result->fetch_object('Producto');
            return $prodCarrito;
        }

        public static function añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id) {
            $con = dataBase::connect();
            $con->query("INSERT INTO productos (`nombre_producto`, `descripcion`, `precio_unidad`, `categoria_id`) VALUES ('$nombre_producto', '$descripcion', '$precio_unidad', '$categoria_id')");
        }

        public static function eliminarProducto($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `productos` WHERE producto_id = $id;");
        }

        public static function modificar($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            $con = dataBase::connect();
            $con->query("UPDATE productos SET `nombre_producto` = $nombre_producto, `descripcion` = $descripcion, `precio_unidad` = $precio_unidad,`categoria_id` = $categoria_id WHERE producto_id = $id");
        }

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
        
        public static function eliminarPedido($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `productos` WHERE producto_id = $id;");
        }

        public static function modificarPedido($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            $con = dataBase::connect();
            $con->query("UPDATE productos SET `nombre_producto` = $nombre_producto, `descripcion` = $descripcion, `precio_unidad` = $precio_unidad,`categoria_id` = $categoria_id WHERE producto_id = $id");
        }

        public static function getAllPedidoProductos() {
            $con = dataBase::connect();
                
            if ($result = $con->query("SELECT * FROM pedido_productos")) {    
                $pedido_productos = array();
                    
                while ($pedido_producto = $result->fetch_object('PedidoProductos')) {
                    $pedido_productos[] = $pedido_producto;
                }
                return $pedido_productos;
            }
        } 
        
        public static function eliminarPedidoProducto($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `productos` WHERE producto_id = $id;");
        }

        public static function modificarPedidoProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            $con = dataBase::connect();
            $con->query("UPDATE productos SET `nombre_producto` = $nombre_producto, `descripcion` = $descripcion, `precio_unidad` = $precio_unidad,`categoria_id` = $categoria_id WHERE producto_id = $id");
        }
    }
?>
