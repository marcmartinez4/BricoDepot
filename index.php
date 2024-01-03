<?php
    include_once 'config/dataBase.php';
    include_once 'config/functions.php';
    include_once 'config/parametros.php';
    include_once 'controlador/pedidoControlador.php';
    include_once 'controlador/productoControlador.php';
    include_once 'controlador/clienteControlador.php';
    include_once 'controlador/homeControlador.php';
    include_once 'modelo/ProductoDAO.php';
    include_once 'modelo/PedidoDAO.php';
    include_once 'controlador/tablaProductosControlador.php';
    include_once 'controlador/registroControlador.php';
    include_once 'controlador/infoControlador.php';
    include_once 'controlador/pedidosAdminControlador.php';
    include_once 'modelo/Cliente.php';
    include_once 'modelo/PedidoProductosDAO.php';
    include_once 'modelo/ClienteDAO.php';
    include_once 'controlador/pedidosUsuarioControlador.php';
    include_once 'controlador/mostrarPedidoUsuario.php';
    include_once 'controlador/usuariosAdminControlador.php';
    include_once 'modelo/Producto.php';
    include_once 'modelo/Pedido.php';
    include_once 'modelo/PedidoProductos.php';

    if (!isset($_GET['controlador'])) {
        header("Location:" . url . "?controlador=home");
    } else {
        $nombre_controlador = $_GET['controlador'] . "Controlador";

        if (class_exists($nombre_controlador)) {
            $controlador = new $nombre_controlador;

            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = action_default;
            }

            $controlador->$action();

        } else {
            header("Location:" . url . "?controlador=home");
        }
    }

    include_once 'vista/footer.html';
?>