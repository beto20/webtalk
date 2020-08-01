<?php

    class ModelChat{
        public $id;
        public $tipo_id;
        public $nombrechat;
        public $fecha;

        //SET & GET
        function setId($id){ $this->id = $id; }
        function getId(){ return $this->id;}
        function setTipo_id($tipo_id){ $this->tipo_id = $tipo_id; }
        function getTipo_id(){ return $this->tipo_id; }
        function setNombrechat($nombrechat){ $this->nombrechat = $nombrechat; }
        function getNombrechat(){ return $this->nombrechat; }
        function setFecha($fecha){ $this->fecha = $fecha; }
        function getFecha(){ return $this->fecha; }

        //CONSTRUCTOR
        public function __construct(){
        require_once('../Util/Conexionpoo.php');
        $db = new Conexionpoo();
        $this->dbcon = $db->conectar();
        }

        public function mostrarchat($userId){
            $sql='SELECT * FROM chat AS a INNER JOIN chatuser AS b ON b.sala_id = a.id WHERE b.usuario_id = :userId';
            $st = $this->dbcon->prepare($sql);
            $st->bindParam(":userId", $userId);
            try {
                if ($st->execute()) {
                    $chats = $st->fetchAll(PDO::FETCH_OBJ);
                }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                return $chats;
        }
        
        
    }

?>