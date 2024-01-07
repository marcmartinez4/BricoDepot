<?php
    class Categoria {
        protected $categoria_id;
        protected $nombre_categoria;

        /**
         * Get the value of categoria_id
         */
        public function getCategoriaId()
        {
                return $this->categoria_id;
        }

        /**
         * Set the value of categoria_id
         */
        public function setCategoriaId($categoria_id): self
        {
                $this->categoria_id = $categoria_id;

                return $this;
        }

        /**
         * Get the value of nombre_categoria
         */
        public function getNombreCategoria()
        {
                return $this->nombre_categoria;
        }

        /**
         * Set the value of nombre_categoria
         */
        public function setNombreCategoria($nombre_categoria): self
        {
                $this->nombre_categoria = $nombre_categoria;

                return $this;
        }
    }
?>