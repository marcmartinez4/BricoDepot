<?php
    // Se incluyen los archivos necesarios
    include_once 'modelo/ClienteDAO.php';
    
    // Se define la clase
    class clienteControlador {
        
        // Método para el index
        public static function index() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Si está definido, se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();
                
                // Y incluye la vista inicio-sesion.php además del header
                include_once 'vista/header.php';
                include_once 'vista/inicio-sesion.php';
            }
        }

        // Método para la página de la cuenta del cliente
        public static function cuenta() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Si está definido, obtiene todos los clientes y el id del cliente actual
                $clientes = ClienteDAO::getAllClientes();
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();
                
                // Y incluye la vista panel-cliente.php además del header
                include_once 'vista/header.php';
                include_once 'vista/panel-cliente.php';
            }
        }

        // Método para la página de modificación de datos del cliente
        public static function modificar() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {            
                // Si está definido, obtiene todos los clientes y el id del cliente actual
                $clientes = ClienteDAO::getAllClientes();
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();
                
                // Incluye la vista modificardatos-cliente.php además del header
                include_once 'vista/header.php';
                include_once 'vista/modificardatos-cliente.php';
            }
        }

        // Método para la modificación de datos principales del cliente
        public static function modificarDatosPrincipales() {
            // Verifica si se han recibido los datos necesarios mediante el método POST
            if (isset($_POST['nuevo_nombre'], $_POST['nuevo_apellido'], $_POST['nuevo_correo'])) {
                // Se convierten los $_POST en variables
                $nuevo_nombre = $_POST['nuevo_nombre'];
                $nuevo_apellido = $_POST['nuevo_apellido'];
                $nuevo_correo = $_POST['nuevo_correo'];
                // Se guarda el id del cliente
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                
                // Llama al método en la clase ClienteDAO para modificar los datos del cliente
                ClienteDAO::modificarDatosPrincipales($nuevo_nombre, $nuevo_apellido, $nuevo_correo, $id_cliente);
                
                // Se redirige a la página de modificar datos
                header('Location:'.url.'?controlador=cliente&action=modificar');
            }
        }

        // Método para la modificación de la contraseña del cliente
        public static function modificarContraseña() {
            // Verifica si se han recibido los datos necesarios mediante el método POST
            if (isset($_POST['contraseña_actual'], $_POST['contraseña_nueva_1'], $_POST['contraseña_nueva_2'])) {
                // Se convierten los $_POST en variables
                $contraseña_actual = $_POST['contraseña_actual'];
                $contraseña_nueva_1 = $_POST['contraseña_nueva_1'];
                $contraseña_nueva_2 = $_POST['contraseña_nueva_2'];
                // Se guarda el id del cliente
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                
                // Obtiene la información del cliente actual desde la base de datos
                $clientes = ClienteDAO::getAllClientes();
                $con = dataBase::connect();

                // Se crea un bucle foreach que va por todos los clientes y se comprueva si el id de estos coincide con el del cliente
                foreach ($clientes as $cliente) {
                    if ($cliente->getCliente_id() == $id_cliente) {
                        // Se guarda en una variable la contraseña guardada en la base de datos del usuario 
                        $result = $con->query("SELECT contra FROM usuarios WHERE cliente_id = '$id_cliente'");
                        $row = $result->fetch_assoc();
                        $contraseña_usuario = $row['contra'];
                    }
                }

                // Verifica la contraseña actual y si las nuevas contraseñas coinciden
                if ($contraseña_actual == $contraseña_usuario) {
                    if ($contraseña_nueva_1 == $contraseña_nueva_2) {
                        // Llama al método en la clase 'ClienteDAO' para modificar la contraseña del cliente
                        ClienteDAO::modificarContraseña($contraseña_nueva_1, $id_cliente);
                        // Se redirige a la página de modificar datos
                        header('Location:'.url.'?controlador=cliente&action=modificar');
                    }
                }
            }
        }

        // Método para iniciar sesión del cliente
        public static function iniciarSesion() {
            // Verifica si se han recibido los datos necesarios mediante el método POST
            if (isset($_POST['mail'], $_POST['contraseña'])) {
                // Se convierten los $_POST en variables
                $mail = $_POST['mail'];
                $contra = $_POST['contraseña'];

                // Llama al método en la clase 'ClienteDAO' para iniciar sesión
                ClienteDAO::iniciarSesion($mail, $contra);
                
                // Se redirige a la página home
                header('Location:'.url.'?controlador=home');
            }
        }
    }
?>
