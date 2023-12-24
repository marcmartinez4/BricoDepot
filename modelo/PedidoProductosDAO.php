<?php
    include_once 'config/dataBase.php';
    include_once 'config/functions.php';
    
    class PedidoProductosDAO {
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

        public static function añadirPedido($Producto, $Cantidad, $IDCliente) {
            $con = dataBase::connect();
            $fecha = date('Y-m-d H:i:s');
            if ($Cantidad < 1) {
                $Cantidad = 1;
            }

            $con->query("INSERT INTO `pedidos`(`estado`, `fecha_pedido`, `cliente_id`) VALUES ('Pendiente','$fecha','$IDCliente')");
            $pedido_id = mysqli_insert_id($con);

            $result = $con->query("SELECT precio_unidad FROM productos WHERE producto_id = '$Producto' LIMIT 1;");
            $row = mysqli_fetch_assoc($result);
            $precio_unidad = $row['precio_unidad'];

            $con->query("INSERT INTO `pedido_productos` (pedido_id, producto_id, cantidad, precio_unidad) VALUES ('$pedido_id', '$Producto', '$Cantidad','$precio_unidad');");
        }
        
        public static function eliminar($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM pedido_productos WHERE pedido_id IN (SELECT pedido_id FROM pedidos WHERE pedido_id = $id);");
            $con->query("DELETE FROM `pedidos` WHERE pedido_id = $id;");
        }

        public static function modificarPedidoProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            $con = dataBase::connect();
            $con->query("UPDATE productos SET `nombre_producto` = $nombre_producto, `descripcion` = $descripcion, `precio_unidad` = $precio_unidad,`categoria_id` = $categoria_id WHERE producto_id = $id");
        }
    }
?>