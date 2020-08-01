<?php
    if (!isset($_POST['val'])) {
        exit();
    }

    include ('../Util/Conexion.php');
    $canal = $_POST['txtcanal'];
    $tipo = $_POST['radiochat'];
    date_default_timezone_set("America/Lima");
    $fecha = date('d-m-Y G:i:s');
    $sql = $conn->prepare("INSERT INTO chat(tipo_id, nombre,fecha ) VALUES (?,?,?)"); 
    $res = $sql->execute([$tipo,$canal,$fecha]);
    if ($res === TRUE) {
        header('Location:../public/home.php');
    }else {
        echo 'error';
    }
?>