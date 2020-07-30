<?php
    session_start();
    include_once '../Util/conexion.php';
    $usuario = $_POST['txtusuario'];
    $contraseña = $_POST['txtcontraseña'];




     $nombredb = 'dbchat';
     $user = 'root';
     $pssw = '';

    //$conexion=mysqli_connect("localhost","root","","dbchat");
    //$query="SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?;";
    $conn = new conexionDB();
    $conn = conectar($nombredb,$user,$pssw );
    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?;');
    $stmt->execute([$usuario, $contraseña]);
    $res = $stmt->fetch(PDO::FETCH_OBJ);
    //print_r($res);


    if ($res === FALSE) {
        header('Location: login.php');
    }elseif ($stmt->rowCount() == 1) {
        echo $_SESSION['nombre'] = $res->nom_ape;
        //header('Location: home.php');
    }



    /*
    $res=mysqli_query($conexion, $query);



    $filas=mysqli_num_rows($res);
    if ($filas>0) {
        header("location:../vista/home.php");
    }else{
        echo"Error";
    }
    mysqli_free_result($res);
    mysqli_close($conexion);

*/



?>