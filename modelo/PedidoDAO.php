<?php
    // Se incluyen los archivos necesarios
    include_once 'config/dataBase.php';
    include_once 'config/functions.php';
    
    // Se declara la clase
    class PedidoDAO {
        
        // Método para añadir un producto al carrito
        public static function añadirCarrito($id, $cantidad_añadir) {
            $found = false;
            $position = -1;
        
            // Verifica si el producto ya está en el carrito
            if (count($_SESSION['carrito']) > 0) {
                for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                    if ($_SESSION['carrito'][$i][0] == $id) {
                        $found = true;
                        $position = $i;
                    }
                }
            }
        
            // Añade el producto al carrito o actualiza la cantidad si ya está presente
            if ($found == false) {
                $p = array($id, $cantidad_añadir);
                array_push($_SESSION['carrito'], $p);
            } else {
                $_SESSION['carrito'][$position][1] += $cantidad_añadir;
            }
        }
        

        // Método para sumar la cantidad de un producto en el carrito
        public static function sumarCantidad($id) {
            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i][0] == $id) {
                    $_SESSION['carrito'][$i][1]++;
                }
            }
        }

        // Método para eliminar un producto del carrito
        public static function eliminarProducto($id) {
            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i][0] == $id) {
                    unset($_SESSION['carrito'][$i]);
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                }
            }
        }

        // Método para restar la cantidad de un producto en el carrito
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

        // Método para finalizar un pedido
        public static function finalizarPedido($precioConIVA, $inputPropinaFinalizar)  {
            $con = database::connect();
            
            // Verifica si hay un cliente en sesión
            if (isset($_SESSION['Cliente'])) {
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                $fecha = date('Y-m-d H:i:s');
                
                // Inserta un nuevo pedido en la base de datos
                $result = $con->query("INSERT INTO pedidos (estado, fecha_pedido, cliente_id, propina) VALUES ('Pendiente', '$fecha', '$id_cliente', '$inputPropinaFinalizar');");
                $pedido_id = mysqli_insert_id($con);
                $_SESSION['pedido_id'] = $pedido_id;
                // Itera sobre los productos en el carrito y los añade al pedido
                foreach($_SESSION['carrito'] as $producto) {
                    $producto_id = $producto[0];
                    $cantidad = $producto[1];

                    // Obtiene el precio unitario del producto
                    $result = $con->query("SELECT precio_unidad FROM productos WHERE producto_id = '$producto_id' LIMIT 1;");
                    $row = mysqli_fetch_assoc($result);
                    $precio_unidad = $row['precio_unidad'];

                    // Inserta el producto en la tabla 'pedido_productos'
                    $result = $con->query("INSERT INTO `pedido_productos` (pedido_id, producto_id, cantidad, precio_unidad) VALUES ('$pedido_id', '$producto_id', '$cantidad','$precio_unidad');");
                }

                setcookie('precioConIVA', $precioConIVA . ',' . $id_cliente, time() + 3600);
            }
        }
        
        public static function informacionPedido($id) {
            $con = database::connect();
            $stmt = $con->prepare("SELECT pedidos.pedido_id, pedidos.estado, pedidos.fecha_pedido, pedido_productos.producto_id, pedido_productos.pedido_id, pedido_productos.cantidad, pedido_productos.precio_unidad, productos.nombre_producto, productos.img FROM pedidos JOIN pedido_productos ON pedidos.pedido_id =pedido_productos.pedido_id JOIN PRODUCTOS ON productos.producto_id = pedido_productos.producto_id WHERE pedidos.pedido_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $info = array();

            while($row = $result->fetch_assoc()) {
                $info[] = [
                    'pedido_id' => $row['pedido_id'],
                    'estado' => $row['estado'],
                    'fecha_pedido' => $row['fecha_pedido'],
                    'producto_id' => $row['producto_id'],
                    'cantidad' => $row['cantidad'],
                    'precio_unidad' => $row['precio_unidad'],
                    'nombre_producto' => $row['nombre_producto'],
                    'img' => $row['img']
                ];
            }
            
            return $info;
        }
    }
?>
