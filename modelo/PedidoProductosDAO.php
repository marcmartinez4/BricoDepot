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