<?php
    include_once 'modelo/Producto.php';
    include_once 'config/dataBase.php';

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
    }
?>
