<?php

    class Chat{
        public $id;
        public $tipo_id;
        public $nombrechat;
        public $fecha;

        //CONSTRUCTOR
        public function __construct(){
            $this->$id = $id;
            $this->$tipo_id = $tipo_id;
            $this->$nombrechat = $nombrechat;
            $this->$fecha = $fecha;
        }
        //SET & GET
        function setId($id){
            $this->id = $id;
        }
        function getId(){
            return $this->id;
        }
        function setTipo_id($tipo_id){
            $this->tipo_id = $tipo_id;
        }
        function getTipo_id(){
            return $this->tipo_id;
        }
        function setNombrechat($nombrechat){
            $this->nombrechat = $nombrechat;
        }
        function getNombrechat(){
            return $this->nombrechat;
        }
        function setFecha($fecha){
            $this->fecha = $fecha;
        }
        function getFecha(){
            return $this->fecha;
        }
        
    }


















?>