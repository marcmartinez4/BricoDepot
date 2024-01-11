<?php
    class Review {
        protected $review_id;
        protected $cliente_id;
        protected $pedido_id;
        protected $titulo;
        protected $review;
        protected $puntuacion;

        /**
         * Get the value of review_id
         */ 
        public function getReview_id()
        {
                return $this->review_id;
        }

        /**
         * Set the value of review_id
         *
         * @return  self
         */ 
        public function setReview_id($review_id)
        {
                $this->review_id = $review_id;

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
         * Get the value of titulo
         */ 
        public function getTitulo()
        {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo)
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Get the value of review
         */ 
        public function getReview()
        {
                return $this->review;
        }

        /**
         * Set the value of review
         *
         * @return  self
         */ 
        public function setReview($review)
        {
                $this->review = $review;

                return $this;
        }

        /**
         * Get the value of puntuacion
         */ 
        public function getPuntuacion()
        {
                return $this->puntuacion;
        }

        /**
         * Set the value of puntuacion
         *
         * @return  self
         */ 
        public function setPuntuacion($puntuacion)
        {
                $this->puntuacion = $puntuacion;

                return $this;
        }
    }
?>