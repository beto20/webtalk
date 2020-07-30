<?php
    if (!isset($_POST['val'])) {
        exit();
    }

    include ('../Util/Conexion.php');
    $usuario=$_POST['txtusuario'];
    $contraseña = $_POST['txtcontraseña'];
    $nom_ape = $_POST['txtnom_ape'];
    $correo = $_POST['txtcorreo'];
    $cargo = $_POST['txtcargo'];
    $estado = 'activo';
    $sql = $conn->prepare("INSERT INTO usuarios(usuario,contraseña,nom_ape,correo,cargo,estado) VALUES (?,?,?,?,?,?)"); 
    $res = $sql->execute([$usuario,$contraseña,$nom_ape,$correo,$cargo,$estado]);
    if ($res === TRUE) {
        
        header('Location:../View/login.php');
    }else {
        echo 'error';
    }
?>