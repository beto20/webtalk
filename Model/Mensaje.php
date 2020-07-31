<?php
    class Mensaje{
        public $id;
        public $usuario_id;
        public $sala_id;
        public $mensaje;
        public $fecha;
        //SET & GET
        function setId($id){ $this->id = $id; }
        function getId(){ return $this->id; }
        function setUsuario_id($usuario_id){ $this->usuario_id = $usuario_id; }
        function getUsuario_id(){ return $this->usuario_id; }
        function setSala_id($sala_id){ $this->sala_id = $sala_id; }
        function getSala_id(){ return $this->sala_id; } 
        function setMensaje($mensaje){ $this->mensaje = $mensaje; }
        function getMesaje(){ return $this->mensaje; }
        function setFecha($fecha){ $this->fecha = $fecha; }
        function getFecha(){ return $this->fecha; }

        //METODO CONSTUCTOR
        public function __construct(){
        require_once('../Util/Conexionpoo.php');
        $db = new Conexionpoo();
        $this->dbcon = $db->conectar();
        }

        public function guardarmensaje(){
            $st = $this->dbcon->prepare('INSERT INTO mensaje(id,usuario_id,sala_id,mensaje,fecha)VALUES(null , :usuarioId , :salaId , :mensaje , :fecha )');
            $st->bindParam(':usuarioId', $this->usuario_id);
            $st->bindParam(':salaId', $this->sala_id);
            $st->bindParam(':mensaje', $this->mensaje);
            $st->bindParam(':fecha', $this->fecha);
            if ($st->execute()) {
                return true;
            }else{
                return false;
            }
        }


        public function cargarmensajes(){
            $st = $this->dbcon->prepare('SELECT * FROM mensaje AS a INNER JOIN usuarios AS b ON b.id = a.usuario_id WHERE sala_id = :salaId ORDER BY b.id DESC');

            $st->bindParam(':salaId', $this->sala_id);
            try {
                if($st->execute()) {
                    $cmensaje = $st->fetch(PDO::FETCH_ASSOC);
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return $cmensaje;
        }



    }







?>