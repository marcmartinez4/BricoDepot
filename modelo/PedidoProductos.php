<?php
    class PedidoProductos {
        protected $pedido_id;
        protected $producto_id;
        protected $cantidad;
        protected $precio_unidad;
        
        /**
         * Get the value of pedido_id
         */ 
        public function getPedido_id()
        {
                return $this->pedido_id;
        }

        /**
         * Set the value of pedido_id
         *
         * @return  self
         */ 
        public function setPedido_id($pedido_id)
        {
                $this->pedido_id = $pedido_id;

                return $this;
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
         * Get the value of cantidad
         */ 
        public function getCantidad()
        {
                return $this->cantidad;
        }

        /**
         * Set the value of cantidad
         *
         * @return  self
         */ 
        public function setCantidad($cantidad)
        {
                $this->cantidad = $cantidad;

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
    }
?>