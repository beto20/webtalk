<?php


   $nombredb = 'dbchat';
   $user = 'root';
   $pssw = '';


    try {
      $conn = new PDO('mysql:host=localhost;dbname='.$nombredb, $user, $pssw);
      //echo "Conexion correcta";

    } catch (Exception $e) {
      echo "Error de conexion".$e->getMessage();

    }
    
  

?>