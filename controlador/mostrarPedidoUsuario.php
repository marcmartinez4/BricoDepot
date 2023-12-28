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

                    echo '<div class="pedido"><h4>Pedido: '.$num_pedido.'<br>Estado: '.$pedido->getEstado().'</h4>';

                    foreach ($pedido_productos as $pedido_producto) {
                        if ($pedido_producto->getPedido_id() == $pedido_id) {
                            $producto_id = $pedido_producto->getProducto_id();

                            foreach ($productos as $producto) {
                                if ($producto->getProducto_id() == $producto_id) {
                                    echo '<div class="info-prod"><img class="imagen-pedido" src="'.$producto->getImg().'"><div class=texto-prod><p class="nombre-producto">'.$producto->getNombre_producto().'</p><div class="cantidad-pedido"><p class="txt-cantidad">Cantidad: '.$pedido_producto->getCantidad().' - Precio por unidad: '.$producto->getPrecio_unidad().' € - Precio total: '.$pedido_producto->getCantidad() * $producto->getPrecio_unidad().' €</p></div></div></div>';
                                }
                            }
                        }
                    }
                    echo '</div>';
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
