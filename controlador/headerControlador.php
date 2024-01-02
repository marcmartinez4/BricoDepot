<?php
    class headerControlador {
        public static function totalProductos() {
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
            $botonCarrito[0] = $total;
            $botonCarrito[1] = $count_array;
            return $botonCarrito;
        }

        public static function mostrarPrecio() {
            $lista = headerControlador::totalProductos();
            if ($lista[0] > 0) {
                $precio_boton = number_format($lista[0], 2, ',', '.').' €';
            } else {
                $precio_boton =  $lista[0].',00 €';
            }
            return $precio_boton;
        }
    }
    $lista = headerControlador::totalProductos();
    $precio_boton = headerControlador::mostrarPrecio();
?>