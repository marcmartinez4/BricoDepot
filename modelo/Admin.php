<?php
    include_once 'modelo/Cliente.php';

    class Admin extends Cliente {
        function __construct() {
            
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
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of apellido
         */ 
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         *
         * @return  self
         */ 
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        /**
         * Get the value of rol
         */ 
        public function getRol()
        {
                return $this->rol;
        }

        /**
         * Set the value of rol
         *
         * @return  self
         */ 
        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }

        /**
         * Get the value of contra
         */ 
        public function getContra()
        {
                return $this->contra;
        }

        /**
         * Set the value of contra
         *
         * @return  self
         */ 
        public function setContra($contra)
        {
                $this->contra = $contra;

                return $this;
        }
    }
?>