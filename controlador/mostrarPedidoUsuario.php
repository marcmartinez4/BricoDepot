<?php
    // Definicionde la clase
    class mostrarPedidoUsuario {
        // Método para mostrar los pedidos del usuario
        public static function mostrarPedidos() {
            // Obtiene todos los clientes, pedidos, productos de pedidos y productos
            $pedidos = ProductoDAO::getAllPedidos();
            $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
            $productos = ProductoDAO::getAllProducts();
            
            // Obtiene el ID del cliente actual desde la sesión
            $id_cliente = $_SESSION['Cliente']->getCliente_id();
            
            // Se crean las variables necesarias
            $pedidoEncontrado = false;
            $num_pedido = 0;

            // Se crea un bucle que va por todos los pedidos
            foreach ($pedidos as $pedido) {
                // Verifica si el pedido pertenece al cliente actual
                if ($pedido->getCliente_id() == $id_cliente) {
                    // Se aumenta el numero del pedido, se convierte en true la variable de pedidoEncontrado y se guarda el id del pedido
                    $num_pedido++;
                    $pedidoEncontrado = true;
                    $pedido_id = $pedido->getPedido_id();

                    // Se muestra el numero del pedido y su estado
                    echo '<div class="pedido"><h4>Pedido: '.$num_pedido.'<br>Estado: '.$pedido->getEstado().'</h4>';

                    // Se crea un bucle que va por todos los pedido_productos
                    foreach ($pedido_productos as $pedido_producto) {
                        // Verifica si el producto pertenece al pedido actual
                        if ($pedido_producto->getPedido_id() == $pedido_id) {
                            $producto_id = $pedido_producto->getProducto_id();

                            // Se crea un bucle que va por todos los productos
                            foreach ($productos as $producto) {
                                // Verifica si el producto actual coincide con el producto del pedido
                                if ($producto->getProducto_id() == $producto_id) {
                                    // Se muestra la imagen del pedido, el nombre, la cantidad, el precio por unidad y el precio total
                                    echo '<div class="info-prod">
                                            <img class="imagen-pedido" src="'.$producto->getImg().'" alt="Imagen pedido">
                                            <div class=texto-prod>
                                                <p class="nombre-producto">'.$producto->getNombre_producto().'</p>
                                                <div class="cantidad-pedido">
                                                    <p class="txt-cantidad">Cantidad: '.$pedido_producto->getCantidad().' - Precio por unidad: '.$producto->getPrecio_unidad().' € - Precio total: '.$pedido_producto->getCantidad() * $producto->getPrecio_unidad().' €</p>
                                                </div>
                                            </div>
                                          </div>';
                                }
                            }
                        }
                    }
                    echo '</div>';
                }
            }

            // Si no se encontraron pedidos para el cliente, muestra un mensaje indicando que no ha realizado ningún pedido
            if (!$pedidoEncontrado) {
                echo '<div class="mensaje-vacio">
                        <p>No ha hecho ningún pedido</p>
                      </div>';
            }
        }
    }
?>
