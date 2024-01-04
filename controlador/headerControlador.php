<?php
    class headerControlador {
        public static function mostrarHeader() {
            $total = 0;
            $count_array = count($_SESSION['carrito']);

            if (isset($_SESSION['carrito'])) {
                foreach($_SESSION['carrito'] as $p) {
                    $prodCarrito = productoDAO::getProductById($p[0]);
                    $cantidad = $p[1];

                    $precioTotalProducto = $prodCarrito->getPrecio_unidad() * $cantidad;
                    $total += $precioTotalProducto;
                }
            }
            $lista = array();
            $lista[0] = $total;
            $lista[1] = $count_array;
            return $lista;
        }
    }
    $lista = headerControlador::mostrarHeader();
?>