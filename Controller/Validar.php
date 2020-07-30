<?php
    session_start();
    include_once ('../Util/Conexion.php');
    $usuario = $_POST['txtusuario'];
    $contraseña = $_POST['txtcontraseña'];
    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?;');
    $stmt->execute([$usuario, $contraseña]);
    $res = $stmt->fetch(PDO::FETCH_OBJ);
    //print_r($res);

    if ($res === FALSE) {
        header('Location: ../View/login.php');
    }elseif ($stmt->rowCount() == 1) {
        $_SESSION['nombre'] = $res->nom_ape;
        header('Location: ../View/home.php');
    }

?>