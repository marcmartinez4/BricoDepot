<?php
    include_once ('../config/dataBase.php');
    include_once ('../config/functions.php');

    class PedidoDAO {
        public static function añadirCarrito($id) {
            $found = false;
            $position = -1;

            if(count($_SESSION['pedido']) > 0) {
                for ($i = 0; $i < count($_SESSION['pedido']); $i++) {
                    if ($_SESSION['pedido'][$i][0] == $id) {
                        $found = true;
                        $position = $i;
                    }
                }
            }

            if ($found == false) {
                $p = array($id, 1);
                array_push($_SESSION['pedido'], $p);
            } else {
                $_SESSION['pedido'][$position][1]++;
            }
        }

        public static function sumarCantidad($id) {
            for ($i = 0; $i < count($_SESSION['pedido']); $i++) {
                if ($_SESSION['pedido'][$i][0] == $id) {
                    $_SESSION['pedido'][$i][1]++;
                }
            }
        }

        public static function restarCantidad($id) {
            for ($i = 0; $i < count($_SESSION['pedido']); $i++) {
                if ($_SESSION['pedido'][$i][0] == $id) {
                    if ($_SESSION['pedido'][$i][1] <= 1) {
                        unset($_SESSION['pedido'][$i]);
                        $_SESSION['pedido'] = array_values($_SESSION['pedido']);
                    } else {
                        $_SESSION['pedido'][$i][1]--; // Restar 1 a la cantidad si es mayor que 1
                    }
                }
            }
        }      
    }

?>