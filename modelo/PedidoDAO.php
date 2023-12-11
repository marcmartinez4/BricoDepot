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

        public static function finalizarPedido()  {
            $con = database::connect();
            
            if (isset($_SESSION['Cliente'])) {
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                $fecha = date('Y-m-d H:i:s');
                
                $result = $con->query("INSERT INTO pedidos (estado, fecha_pedido, cliente_id) VALUES ('Pendiente', '$fecha', '$id_cliente');");
            
                $result = $con->query("SELECT pedido_id FROM pedidos WHERE cliente_id = '$id_cliente' AND fecha_pedido = '$fecha' LIMIT 1;");
                $row = mysqli_fetch_assoc($result);
                $pedido_id = $row['pedido_id'];

                foreach($_SESSION['carrito'] as $producto) {
                    $producto_id = $producto[0];
                    $cantidad = $producto[1];

                    $result = $con->query("SELECT precio_unidad FROM productos WHERE producto_id = '$producto_id' LIMIT 1;");
                    $row = mysqli_fetch_assoc($result);
                    $precio_unidad = $row['precio_unidad'];
                    $result = $con->query("INSERT INTO `pedido_productos` (pedido_id, producto_id, cantidad, precio_unidad) VALUES ('$pedido_id', '$producto_id', '$cantidad', '$precio_unidad');");
                }

            } else {
                header('Location: ../vista/inicio-sesion.php');
            }
        }        
    }

?>