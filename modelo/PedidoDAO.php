<?php
    include_once ('../config/dataBase.php');
    include_once ('../config/functions.php');

    class PedidoDAO {
        public static function añadirCarrito($id, $cantidad_añadir) {
            $found = false;
            $position = -1;
        
            if (count($_SESSION['carrito']) > 0) {
                for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                    if ($_SESSION['carrito'][$i][0] == $id) {
                        $found = true;
                        $position = $i;
                    }
                }
            }
        
            if ($found == false) {
                $p = array($id, $cantidad_añadir);
                array_push($_SESSION['carrito'], $p);
            } else {
                $_SESSION['carrito'][$position][1] += $cantidad_añadir;
            }
        }
        

        public static function sumarCantidad($id) {
            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i][0] == $id) {
                    $_SESSION['carrito'][$i][1]++;
                }
            }
        }

        public static function eliminarProducto($id) {
            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i][0] == $id) {
                    unset($_SESSION['carrito'][$i]);
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                }
            }
        }

        public static function restarCantidad($id) {
            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i][0] == $id) {
                    if ($_SESSION['carrito'][$i][1] <= 1) {
                        unset($_SESSION['carrito'][$i]);
                        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                    } else {
                        $_SESSION['carrito'][$i][1]--;
                    }
                }
            }
        }
    }

?>