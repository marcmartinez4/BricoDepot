<?php
    class headerControlador {
        public static function mostrarHeader() {
            // Se define la variable del total del carrito y de la cantidad de productos que hay en este
            $total = 0;
            $count_array = count($_SESSION['carrito']);

            // Se verifica si carrito existe y se crea un bucle foreach que pasa por todos los productos de este
            if (isset($_SESSION['carrito'])) {
                foreach($_SESSION['carrito'] as $productos) {
                    $prodCarrito = productoDAO::getProductById($productos[0]);
                    $cantidad = $productos[1];

                    // Se calcula el precio total del producto
                    $precioTotalProducto = $prodCarrito->getPrecio_unidad() * $cantidad;
                    $total += $precioTotalProducto;
                }
            }
            // Se suma el iva al total
            $total = $total + ($total * 0.10);
            // Se crea una lista con estos dos valores 
            $lista = array();
            $lista[0] = $total;
            $lista[1] = $count_array;
            return $lista;
        }
    }
?>