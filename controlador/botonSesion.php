<?php
    class botonSesion {
        public static function botonSesion() {
            if (isset($_SESSION['Cliente'])) {
                echo '<a href="../controlador/cerrarSesión.php" class="nav-link active boton-cuenta">C. Sesión</a>';
                
            } else {
                echo '<a href="inicio-sesion.php" class="nav-link active boton-cuenta">Mi cuenta</a>';
            }
        }
    }
?>