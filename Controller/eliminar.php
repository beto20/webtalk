<?php
    if (!isset($_GET['id'])) {
        exit();
    }
    $id = $_GET['id'];
    include ('../Util/Conexion.php');
    $sql = $conn->prepare('delete from chat where id = ?');
    $res = $sql->execute([$id]);
    
    if ($res === TRUE) {
        header('Location: ../public/home.php');
    }else {
        //echo 'error';
        header('Location: ../public/home.php');
    }
?>