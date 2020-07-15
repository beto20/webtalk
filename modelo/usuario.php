<?php

  class usuario{
    private $id;
    private $nomape;
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
    function setNomape($nomape){
      $this->nomape = $nomape;
    }
    function getNomape(){
      return $this->nomape;
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
      $this->dbcon = var1->conectar();
    }

    //METODOS
    public function registrar(){
      $sql="INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `nom_ape`, `correo`, `cargo`, `estado`)
            VALUES (NULL, '$usuario' , '$contraseña' , '$nomape' , '$correo', '$cargo', '$estado')";

      mysql($dbcon,$sql);

    }

    public function iniciarsesion(){
      $sql="SELECT * FROM usuarios WHERE correo = '$correo' AND contraseña = '$contraseña'";

    }





  }

 ?>
