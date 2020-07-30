<?php
    class Mensaje{
        public $id;
        public $usuario_id;
        public $sala_id;
        public $mensaje;
        public $fecha;

        //CONSTRUCTOR

        public function __constuctor(){
            $this->$id = $id;
            $this->$usuario_id = $usuario_id;
            $this->$sala_id = $sala_id;
            $this->$mensaje = $mensaje;
            $this->$fecha = $fecha;
        }

        //SET & GET

        function setId($id){
            $this->id = $id;
        }
        function getId(){
            return $this->id;
        }
        function setUsuario_id($usuario_id){
            $this->usuario_id = $usuario_id;
        }
        function getUsuario_id(){
            return $this->usuario_id;
        }
        function setSala_id($sala_id){
            $this->sala_id = $sala_id;
        }
        function getSala_id(){
            return $this->sala_id;
        }
        function setMensaje($mensaje){
            $this->mensaje = $mensaje;
        }
        function getMesaje(){
            return $this->mensaje;
        }
        function setFecha($fecha){
            $this->fecha = $fecha;
        }
        function getFecha(){
            return $this->fecha;
        }




    }







?>