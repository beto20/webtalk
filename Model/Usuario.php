<?php

  class Usuario{
    private $id;
    private $nom_ape;
    private $usuario;
    private $correo;
    private $pass;
    private $cargo;
    private $estado;
    public $dbcon;
    public $chatuser_id;

    function setId($id){ $this->id = $id; }
    function getId(){ return $this->id; }

    function setNom_ape($nom_ape){ $this->nom_ape = $nom_ape; }
    function getNom_ape(){ return $this->nom_ape; }

    function setUsuario($usuario){ $this->usuario = $usuario; }
    function getUsuario(){ return $this->usuario; }

    function setCorreo($correo){ $this->correo = $correo; }
    function getCorreo(){ return $this->correo; }

    function setPass($pass){ $this->pass=$pass; }
    function getPass(){ return $this->pass; }

    function setCargo($cargo){ $this->cargo=$cargo; }
    function getCargo(){ return $this->cargo; }

    function setEstado($estado){ $this->estado=$estado; }
    function getEstado(){ return $this->estado; }



    //METODO CONSTUCTOR

    public function __construct(){
      require_once('../Util/Conexionpoo.php');
      $db = new Conexionpoo();
      $this->dbcon = $db->conectar();
    }

    //METODOS
    public function registrar(){
      $sql = "INSERT INTO `usuarios`(`id`,`usuario`, `contraseña`, `nom_ape`, `correo`, `cargo`, `estado`)
            VALUES(null, :usuario , :pass , :nom_ape , :correo, :cargo, :estado)";

      $st = $this->dbcon->prepare($sql);

      $st->bindParam(":usuario", $this->usuario);
      $st->bindParam(":pass", $this->pass);
      $st->bindParam(":nom_ape", $this->nom_ape);
      $st->bindParam(":correo", $this->correo);
      $st->bindParam(":cargo", $this->cargo);
      $st->bindParam(":estado", $this->estado);
      try{
        if($st->execute()) {
          return true;
        }else{
          return false;
        }
      }catch(Exception $e){
          echo $e->getMessage();
      }
    }





    public function iniciarsesion($usuario, $pass){
      $sql="SELECT * FROM usuarios WHERE usuario = :usuario AND contraseña = :pass";
      $st = $this->dbcon->prepare($sql);
      $st->bindParam(":usuario", $usuario);
      $st->bindParam(":pass", $pass);

      try {
          if ($st->execute()) {
            return true;
          }else{
            return false;
          }
      } catch (Exception $e) {
          echo $e->getMessage();
      }
    }

    public function chatXid($id){
      $sql = "SELECT a.usuario_id,b.nombre,b.fecha FROM chatuser AS a INNER JOIN chat AS b ON a.sala_id=b.id WHERE usuario_id= :id";
      $st = $this->dbcon->prepare($sql);
      $st->bindParam(":id", $id);
      try {
        if ($st->execute()) {
          return $st;
        }else{
          return false;
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }


    
    public function userXid(){
      $st = $this->dbcon->prepare('SELECT * FROM usuarios WHERE id = :id');
      $st->bindParam(':id', $this->id);
      try {
				if($st->execute()) {
					$usuario = $st->fetch(PDO::FETCH_ASSOC);
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			return $usuario;
    }

    public function userXmensaje($IdCanal){
      $st = $this->dbcon->prepare('SELECT a.id ,a.nom_ape, b.mensaje, b.fecha FROM usuarios AS a INNER JOIN mensaje AS b ON b.usuario_id=a.id WHERE sala_id = :salaid ORDER BY a.id DESC');
      $st->bindParam(':salaid', $IdCanal);
      try {
        if ($st->execute()) {
          $mensajes = $st->fetchAll(PDO::FETCH_OBJ);
          return $mensajes;
        }else{
          return false;
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    
    
    public function userXcanal($IdCanal){
      //require('../Model/Chatuser.php');

      $st = $this->dbcon->prepare('SELECT * FROM usuarios AS a INNER JOIN chatuser AS b ON a.id=b.usuario_id WHERE sala_id = :salaid');
      $st->bindParam(':salaid', $IdCanal);
      try {
        if ($st->execute()) {
          $usuarios = $st->fetchAll(PDO::FETCH_OBJ);
          return $usuarios;
        }else{
          return false;
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

}

  ?>
