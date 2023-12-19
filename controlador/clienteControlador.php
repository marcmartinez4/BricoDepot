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