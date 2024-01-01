<?php
    // Se define la clase
    class dataBase {
        
        // Método para conectar a la base de datos estableciendo directamente los datos
        public static function connect($host='localhost', $user='root', $pwd='', $db='restaurante') {
            
            // Crear una nueva instancia para la conexión a la base de datos
            $con = new mysqli($host, $user, $pwd, $db);
            
            // Verificar si la conexión fue exitosa
            if($con == false) {
                // Si la conexión falla, mostrará un mensaje de error
                die('DATABASE ERROR!');
            } else  {
                return $con;
            }
        }
    }
?>
