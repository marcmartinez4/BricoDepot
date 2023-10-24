<?php
    abstract class Producto {
        protected $producto_id;
        protected $nombre_producto;
        protected $descripcion;
        protected $precio_unidad;
        protected $categoria_id;

        public function __construct() {
            
        }

        /**
         * Get the value of producto_id
         */ 
        public function getProducto_id()
        {
                return $this->producto_id;
        }

        /**
         * Set the value of producto_id
         *
         * @return  self
         */ 
        public function setProducto_id($producto_id)
        {
                $this->producto_id = $producto_id;

                return $this;
        }

        /**
         * Get the value of nombre_producto
         */ 
        public function getNombre_producto()
        {
                return $this->nombre_producto;
        }

        /**
         * Set the value of nombre_producto
         *
         * @return  self
         */ 
        public function setNombre_producto($nombre_producto)
        {
                $this->nombre_producto = $nombre_producto;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of precio_unidad
         */ 
        public function getPrecio_unidad()
        {
                return $this->precio_unidad;
        }

        /**
         * Set the value of precio_unidad
         *
         * @return  self
         */ 
        public function setPrecio_unidad($precio_unidad)
        {
                $this->precio_unidad = $precio_unidad;

                return $this;
        }

        /**
         * Get the value of categoria_id
         */ 
        public function getCategoria_id()
        {
                return $this->categoria_id;
        }

        /**
         * Set the value of categoria_id
         *
         * @return  self
         */ 
        public function setCategoria_id($categoria_id)
        {
                $this->categoria_id = $categoria_id;

                return $this;
        }
    }
?>