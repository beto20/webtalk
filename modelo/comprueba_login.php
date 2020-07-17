<?php
  try {
    $base = new PDO("mysql:host=localhost; dbname=dbchat", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT * FROM usuarios WHERE usuario = :nomuser AND contraseña = :contraseña";
    $res=$base->prepare($sql);
    $nomuser=htmlentities(addslashes($_POST["nomuser"]));
    $contraseña=htmlentities(addslashes($_POST["contraseña"]));
    $res->bindValue(":nomuser",$nomuser);
    $res->bindValue(":contraseña",$contraseña);
    $res->execute();
    $numero_registro=$res->rowCount();
    if ($numero_registro!=0) {
      echo "BIENVENIDO";
    }else {
      echo "FALLIDO";
      header("location:../vista/login.php");
    }


  } catch (Exception $e) {
    die("ERROR: ". $e->getMessage());
  }

 ?>
