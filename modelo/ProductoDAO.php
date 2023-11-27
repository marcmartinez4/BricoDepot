<?php
    include_once '../modelo/Producto.php';
    include_once '../config/dataBase.php';
    include_once '../config/functions.php';

    class productoDAO {
        public static function getAllProducts() {
            $con = dataBase::connect();
                
            if($result = $con->query("SELECT * FROM productos")) {    
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

        public static function eliminar($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `productos` WHERE `producto`.`producto_id` = $id");
        }

        public static function modificar($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            $con = dataBase::connect();
            $con->query("UPDATE productos SET `nombre_producto` = $nombre_producto, `descripcion` = $descripcion, `precio_unidad` = $precio_unidad,`categoria_id` = $categoria_id WHERE producto_id = $id");
        }

        /* include ("../modelo/Producto.php");
        class ProductoDAO {
            public static function getAllProducts() {
                
                $con = dataBase::connect();
                
                if($result = $con->query("SELECT * FROM productos")) {
                    
                    $productos = array();
                    
                    while ($producto = $result->fetch_object('Producto')) {
                        $productos[] = $producto;
                    }
                    return $productos;
                }
            }

            public static function deleteProducts() {
                $con = dataBase::connect();
                $id_eliminar = $_POST['producto_id'];
                $con->query("DELETE FROM `productos` WHERE `producto_id` = $id_eliminar");
            }

            public static function modificarProducto() {
                $con = dataBase::connect();
                $id_modificar = $_POST['producto_id'];
                $con->query("UPDATE productos SET `nombre_producto`='$nombre_producto',`descripcion`='$descripcion',`precio_unidad`='precio_unidad',`categoria_id`='$categoria_id' WHERE producto_id = $id_modificar");
            }
        } */
    }
?>
