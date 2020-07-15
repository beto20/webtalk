<?php
  class dbconexion{
    private $host='localhost';
    private $dbnombre='dbchat';
    private $usuario='root';
    private $pssw='';

    public function conectar(){
        try{
          $conn= new PDO('mysql:host='.$this->host.'; dbname='.$this->dbnombre, $this->usuario, $this->pssw);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        }catch( PDOException $e ){
          echo 'Error: '.$e->getMessage();
        }
    }



  }






?>
