<?php
    include_once 'modelo/ClienteDAO.php';
    
    class clienteControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/inicio-sesion.php';
            }
        }

        public static function cuenta() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $clientes = ClienteDAO::getAllClientes();
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                include_once 'vista/panel-cliente.php';
            }
        }

        public static function modificar() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {            
                $clientes = ClienteDAO::getAllClientes();
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                include_once 'vista/modificardatos-cliente.php';
            }
        }

        public static function modificarDatosPrincipales() {
            if (isset($_POST['nuevo_nombre'], $_POST['nuevo_apellido'], $_POST['nuevo_correo'])) {
                $nuevo_nombre = $_POST['nuevo_nombre'];
                $nuevo_apellido = $_POST['nuevo_apellido'];
                $nuevo_correo = $_POST['nuevo_correo'];
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                
                ClienteDAO::modificarDatosPrincipales($nuevo_nombre, $nuevo_apellido, $nuevo_correo, $id_cliente);
                include_once 'vista/modificardatos-cliente.php';
            }
        }

        public static function modificarContraseña() {
            if (isset($_POST['contraseña_actual'], $_POST['contraseña_nueva_1'], $_POST['contraseña_nueva_2'])) {
                $contraseña_actual = $_POST['contraseña_actual'];
                $contraseña_nueva_1 = $_POST['contraseña_nueva_1'];
                $contraseña_nueva_2 = $_POST['contraseña_nueva_2'];
                $id_cliente = $_SESSION['Cliente']->getCliente_id();
                $clientes = ClienteDAO::getAllClientes();
                $con = dataBase::connect();

                foreach ($clientes as $cliente) {
                    if ($cliente->getCliente_id() == $id_cliente) {
                        $result = $con->query("SELECT contra FROM usuarios WHERE cliente_id = '$id_cliente'");
                        $row = $result->fetch_assoc();
                        $contraseña_usuario = $row['contra'];
                    }
                }
                if ($contraseña_actual == $contraseña_usuario) {
                    if ($contraseña_nueva_1 == $contraseña_nueva_2) {
                        ClienteDAO::modificarContraseña($contraseña_nueva_1, $id_cliente);
                        include_once 'vista/modificardatos-cliente.php';
                    }
                }
            }
        }

        public static function iniciarSesion() {
            if (isset($_POST['mail'], $_POST['contraseña'])) {
                $mail = $_POST['mail'];
                $contra = $_POST['contraseña'];

                ClienteDAO::iniciarSesion($mail, $contra);
                include_once 'vista/home.php';
                // header('Location:'.url.'?controlador=home');
            }
        }
    }
?>