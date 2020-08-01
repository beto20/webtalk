<?php
    session_start();
    include_once ('../Util/Conexion.php');
    $usuario = $_POST['txtusuario'];
    $contraseña = $_POST['txtpass'];

    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?;');
    $stmt->execute([$usuario, $contraseña]);
    $res = $stmt->fetch(PDO::FETCH_OBJ);
    //print_r($res);

    if ($res === FALSE) {
        header('Location: ../public/login.php');
    }elseif ($stmt->rowCount() == 1) {
        $_SESSION['id'] = $res->id;
        $_SESSION['usuario'] = $res->usuario;
        $_SESSION['pass'] = $res->contraseña;
        $_SESSION['nombre'] = $res->nom_ape;
        $_SESSION['correo'] = $res->correo;
        $_SESSION['cargo'] = $res->cargo;
        $_SESSION['estado'] = $res->estado;

        header('Location: ../public/home.php');
    }

?>