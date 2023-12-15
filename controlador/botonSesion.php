<?php
    class botonSesion {
        public static function botonSesion() {
            if (isset($_SESSION['Cliente'])) {
                echo '<a href="url ?controller=cliente" class="nav-link active boton-cuenta">Sesión</a>';
                
            } else {
                echo '<a href="?controlador=cliente" class="nav-link active boton-cuenta">Mi cuenta</a>';
            }
        }
    }
?>