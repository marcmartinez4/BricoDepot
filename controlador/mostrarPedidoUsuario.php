<?php
    class mostrarPedidoUsuario {
        public static function mostrarPedidos() {
            $clientes = ClienteDAO::getAllClientes();
            $pedidos = ProductoDAO::getAllPedidos();
            $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
            $productos = ProductoDAO::getAllProducts();
            $id_cliente = $_SESSION['Cliente']->getCliente_id();
            $pedidoEncontrado = false;
            $num_pedido = 0;

            foreach ($pedidos as $pedido) {
                if ($pedido->getCliente_id() == $id_cliente) {
                    $num_pedido++;
                    $pedidoEncontrado = true;
                    $pedido_id = $pedido->getPedido_id();

                    echo ' Pedido: ' . $num_pedido . '<br>Estado: ' . $pedido->getEstado() . '<br>';

                    foreach ($pedido_productos as $pedido_producto) {
                        if ($pedido_producto->getPedido_id() == $pedido_id) {
                            $producto_id = $pedido_producto->getProducto_id();

                            echo 'Cantidad: ' . $pedido_producto->getCantidad() . '<br>';

                            foreach ($productos as $producto) {
                                if ($producto->getProducto_id() == $producto_id) {
                                    echo '<img style="width: 118px; height: 108px;" class="imagen-pedido" src="'.$producto->getImg().'">'.'$producto->getNombre_producto() . '<br>Precio por unidad: ' . $producto->getPrecio_unidad() . '<br><br>';
                                }
                            }
                        }
                    }
                }
            }

            if (!$pedidoEncontrado) {
                ?>
                <div class="mensaje-vacio">
                    <p>No ha hecho ningún pedido</p>
                </div>
                <?php
            }
        }
    }
?>
