<?php

  class usuario{
    private $id;
    private $nom_ape;
    private $usuario;
    private $correo;
    private $contraseña;
    private $cargo;
    private $estado;
    public $dbcon;

    function setId($id){
      $this->id = $id;
    }
    function getId(){
      return $this->id;
    }
    function setnom_ape($nom_ape){
      $this->nom_ape = $nom_ape;
    }
    function getnom_ape(){
      return $this->nom_ape;
    }
    function setUsuario($usuario){
      $this->usuario = $usuario;
    }
    function getUsuario(){
      return $this->usuario;
    }
    function setCorreo($correo){
      $this->correo = $correo;
    }
    function getCorreo(){
      return $this->correo;
    }
    function setContraseña($contraseña){
      $this->contraseña=$contraseña;
    }
    function getContraseña(){
      return $this->contraseña;
    }
    function setCargo($cargo){
      $this->cargo=$cargo;
    }
    function getCargo(){
      return $this->cargo;
    }
    function setEstado($estado){
      $this->estado=$estado;
    }
    function getEstado(){
      return $this->estado;
    }
    //METODO CONSTUCTOR
    public function __construct(){
      require('conexion.php');
      $var1= new conexion();
      $this->dbcon = $var1->conectar();
    }

    //METODOS
    //
    public function registrar(){
      $sql="INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `nom_ape`, `correo`, `cargo`, `estado`)
            VALUES (NULL, :usuario , :contraseña , :nom_ape , :correo, :cargo, :estado)";

      $st=$this->$dbcon->prepare($sql);
      $st->bindParam(':usuario', $this->usuario);
      $st->bindParam(':contraseña', $this->contraseña);
      $st->bindParam(':nom_ape', $this->nom_ape);
      $st->bindParam(':correo', $this->correo);
      $st->bindParam(':cargo', $this->cargo);
      $st->bindParam(':estado', $this->estado);
      try{
        if ($st->execute()) {
          return true;
        }
      }catch(Exception $e){
          echo $e->getMessage();
      }
    }



    public function iniciarsesion(){


      $sql="SELECT * FROM usuarios WHERE correo = '$correo' AND contraseña = '$contraseña'";
      try {
          if ($sql) {
            echo 'Correcto';
            header('inicio.php');
          }
      } catch (Exception $e) {
          echo $e->getMessage();
      }


    }





  }

 ?>
