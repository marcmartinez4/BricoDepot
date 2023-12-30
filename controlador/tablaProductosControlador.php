<?php
    class tablaProductosControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $productos = ProductoDAO::getAllProducts();
                include_once 'vista/base-datos.php';
            }
        }

        public static function añadir() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/base-datos.php';
            } else {
                include_once 'vista/añadirProducto.php';
            }
        }

        public static function añadirProducto() {
            if(isset($_POST['nombre_producto'], $_POST['descripcion'], $_POST['precio_unidad'], $_POST['categoria_id'])) {
            
                $nombre_producto = $_POST['nombre_producto'];
                $descripcion = $_POST['descripcion'];
                $precio_unidad = $_POST['precio_unidad']; 
                $categoria_id = $_POST['categoria_id'];
    
                productoDAO::añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
                $productos = ProductoDAO::getAllProducts();
                include_once 'vista/base-datos.php';
            }
        }

        public static function modificar() {
            $id = $_POST['producto_id'];

            if (!isset($_GET['controlador'])) {
                include_once 'vista/base-datos.php';
            } else if (isset($_POST['producto_id'])) {    
                $producto = productoDAO::getProductById($id);
                include_once 'vista/modificarProducto.php';
            }
        }

        public static function modificarProducto() {
            $nombre_producto = $_POST['nombre_producto']; 
            $descripcion = $_POST['descripcion'];
            $precio_unidad = $_POST['precio_unidad'];
            $categoria_id = $_POST['categoria_id'];
            $id = $_POST['producto_id'];    
                
            productoDAO::modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id);
            $productos = ProductoDAO::getAllProducts();
            include_once 'vista/base-datos.php';
        }

        public static function eliminar() {
            $id = $_POST['producto_id'];

            if(!isset($_GET['controlador'])) {
                include_once 'vista/base-datos.php';
            } else if (isset($_POST['Eliminar'])) {
                ProductoDAO::eliminarProducto($id);
                $productos = ProductoDAO::getAllProducts();
                include_once 'vista/base-datos.php';
            }
        }
    }
?>