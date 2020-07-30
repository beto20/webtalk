<?php
    if (!isset($_GET['id'])) {
        exit();
    }
    $id = $_GET['id'];
    include ('../Util/Conexion.php');
    $sql = $conn->prepare('delete from chat where id = ?');
    $res = $sql->execute([$id]);
    
    if ($res === TRUE) {
        header('Location: ../View/home.php');
    }else {
        echo 'error';
    }
?>