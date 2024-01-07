<?php
    class CategoriaDAO {
        public static function getAllCategorias() {
            $con = dataBase::connect();
                
            // Ejecuta la consulta SQL para obtener todos las categorias
            if ($result = $con->query("SELECT * FROM categorias")) {    
                $categorias = array();
                    
                // Itera sobre los resultados y crea objetos Cliente
                while ($categoria = $result->fetch_object('Categoria')) {
                    $categorias[] = $categoria;
                }
                return $categorias;
            }
        }
    }
?>