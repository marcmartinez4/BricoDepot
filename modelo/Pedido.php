<?php
    class Pedido {
        protected $pedido_id;
        protected $estado;
        protected $fecha_pedido;
        protected $cliente_id;
        protected $propina;
        protected $precio_total;
        protected $puntos_usados;

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
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        /**
         * Get the value of fecha_pedido
         */ 
        public function getFecha_pedido()
        {
                return $this->fecha_pedido;
        }

        /**
         * Set the value of fecha_pedido
         *
         * @return  self
         */ 
        public function setFecha_pedido($fecha_pedido)
        {
                $this->fecha_pedido = $fecha_pedido;

                return $this;
        }

        /**
         * Get the value of cliente_id
         */ 
        public function getCliente_id()
        {
                return $this->cliente_id;
        }

        /**
         * Set the value of cliente_id
         *
         * @return  self
         */ 
        public function setCliente_id($cliente_id)
        {
                $this->cliente_id = $cliente_id;

                return $this;
        }

        /**
         * Get the value of propina
         */ 
        public function getPropina()
        {
                return $this->propina;
        }

        /**
         * Set the value of propina
         *
         * @return  self
         */ 
        public function setPropina($propina)
        {
                $this->propina = $propina;

                return $this;
        }

        /**
         * Get the value of precio_total
         */
        public function getPrecioTotal()
        {
                return $this->precio_total;
        }

        /**
         * Set the value of precio_total
         */
        public function setPrecioTotal($precio_total): self
        {
                $this->precio_total = $precio_total;

                return $this;
        }

        /**
         * Get the value of puntos_usados
         */
        public function getPuntosUsados()
        {
                return $this->puntos_usados;
        }

        /**
         * Set the value of puntos_usados
         */
        public function setPuntosUsados($puntos_usados): self
        {
                $this->puntos_usados = $puntos_usados;

                return $this;
        }
    }
?>