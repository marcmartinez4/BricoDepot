<?php
    // Se incluyen todos los archivos necesarios 
    include_once 'modelo/Cliente.php';
    include_once 'modelo/Usuario.php';
    include_once 'modelo/Admin.php';
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
    include_once 'modelo/PedidoProductosDAO.php';
    include_once 'modelo/ClienteDAO.php';
    include_once 'controlador/pedidosUsuarioControlador.php';
    include_once 'controlador/mostrarPedidoUsuario.php';
    include_once 'controlador/usuariosAdminControlador.php';
    include_once 'modelo/Producto.php';
    include_once 'modelo/Pedido.php';
    include_once 'modelo/CategoriaDAO.php';
    include_once 'modelo/Categoria.php';
    include_once 'modelo/PedidoProductos.php';
    include_once 'controlador/headerControlador.php'; 

    // Verifica si existe el parametro controlador en la URL
    if (!isset($_GET['controlador'])) {
        // Redirige a la página home si el controlador no existe
        header("Location:" . url . "?controlador=home");
    } else {
        // Si existe, se crea la variable $nombre_controlador con el valor de controlador y la palabra Controlador
        $nombre_controlador = $_GET['controlador'] . "Controlador";

        // Si la clase de $nombre_controlador existe se crea un objeto
        if (class_exists($nombre_controlador)) {
            $controlador = new $nombre_controlador;

            // Si existe el valor de action en la URL se declara la variable con su valor
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                // Si no existe se declara con el valor por defecto (index)
                $action = action_default;
            }

            // Se invoca la accion del controlador
            $controlador->$action();

        } else {
            // Si no existe la clase, se carga la página home
            header("Location:" . url . "?controlador=home");
        }
    }

    // Se incluye el footer
    include_once 'vista/footer.html';
?>