<?php

    session_start();
    include('../Util/Conexion.php');

    if (!isset($_SESSION['nombre'])) {
        header('Location: ../View/login.php');
    }elseif (isset($_SESSION['nombre'])) {


        $sql = $conn->query("SELECT * FROM chat");
        $chats = $sql->fetchAll(PDO::FETCH_OBJ);
        //print_r($chats);


    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

    <div class="ml-5">
        <h3>Bienvenido: <?php echo $_SESSION['nombre'] ?></h3>
        <a href="../Controller/Cerrar.php" class="btn btn-danger">Cerrar sesion</a>
        <h3>Chats</h3>
        <table >
            <tr>
                <td>id</td>
                <td>tipo_id</td>
                <td>nombre</td>
                <td>fecha</td>
                <td>Opciones</td>
            </tr>

            <?php
                foreach ($chats as $chat) {
                    ?>
                    <tr>
                        <td><?php echo $chat->id ?></td>
                        <td><?php echo $chat->tipo_id ?></td>
                        <td><?php echo $chat->nombre ?></td>
                        <td><?php echo $chat->fecha ?></td>
                        <td><a class="btn btn-warning" href="#" id="ingresarcanal" name="ingresarcanal">Ingresar al canal</a></td>
                        <td><a class="btn btn-danger" href="../Controller/eliminar.php?id=<?php echo $chat->id ?>" >Eliminar canal</a></td>
                    </tr>

                <?php
                }
            ?>
        </table>
    </div>
<?php

?>
    <hr>
<h3>insertar</h3>
    <section>
        <form method="POST" class="col-8 s mt-5" action="../Controller/insertar.php">
            <div class="form-row" >
            <div class="form-group col-md-3">
                <label for="canal">Nombre del canal</label>
                <input type="text" class="form-control" name="txtcanal">
            </div>
            <div class="form-group col-md-3">
                <label>Selecione tipo de chat</label>
                <div>
                <input class="form-check-input" type="radio" name="radiochat" id="radiochat2" value="1">
                <label class="form-check-label" for="exampleRadios2">Chat privado</label>
                <br>
                <input class="form-check-input" type="radio" name="radiochat" id="radiochat2" value="2">
                <label class="form-check-label" for="exampleRadios2">Chat grupal</label>
                </div>
            </div>
            <br>
            <div>
                <input type="submit" name="registrar" class="btn btn-primary" value="Registrar"></input>
                <input type="hidden" name="val" value="1">
                <a class="btn btn-danger" href="../View/index.php">Cancelar</a>
            </div>
        </form>
    </section>





</body>
</html>