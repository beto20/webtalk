<?php

  class Conexionpoo 
  {
    private $host = 'localhost';
    private $nombredb = 'dbchat';
    private $user = 'root';
    private $pssw = '';

    public function conectar(){
      try {
        $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->nombredb, $this->user, $this->pssw);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
      } catch (PDOException $e) {
        echo "Error de conexion".$e->getMessage();
      }
    }
  }

?>