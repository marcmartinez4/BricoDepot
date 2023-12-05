<?php
    class botonSesion {
        public static function botonSesion() {
            if (isset($_SESSION['Cliente'])) {
                echo '<a href="../controlador/cerrarSesión.php" class="nav-link active boton-cuenta">Sesión</a>';
                
            } else {
                echo '<a href="inicio-sesion.php" class="nav-link active boton-cuenta">Mi cuenta</a>';
            }
        }

        /*public static function botonAdmin() {
            if (isset($_SESSION['Cliente'])) {
                if ($_SESSION['Cliente']->getNombre() == 'admin') {
                    echo '<li class="nav-item">
                            <a href="../vista/base-datos.php">
                                <img class="iconos-header" src="../img/base-datos.png">

                                <a class="nav-link active boton-cuenta">Productos</a>
                            </a>
                          </li>';
                }
            }
        }*/
    }
?>