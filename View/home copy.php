<?php

    session_start();
    include('../Util/Conexion.php');
    /*
    if (!isset($_SESSION['nombre'])) {
        header('Location: ../View/login.php');
    }elseif (isset($_SESSION['nombre'])) {
        */

        //$sql = $conn->query("SELECT * FROM chat");
        //$chats = $sql->fetchAll(PDO::FETCH_OBJ);
        //print_r($chats);


    //}
    $objusuario = new Usuario;
    $rs = $objusuario->chatXid(1);
    $chats = $sql->fetchAll(PDO::FETCH_OBJ);





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


<head >
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <h4 class="m-auto" >WEBTALK</h4>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                <a class="nav-link m-auto" style="text-align: center;"> Bienvenido: <?php echo $_SESSION['nombre'] ?></a>
                </li>

            </ul>
            <div class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 m-auto">
                    <li class="nav-item active">
                    <a class="nav-link m-auto" ><?php date_default_timezone_set("America/Lima"); echo date('d-m-Y G:i')?> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown m-auto">
                        <a class="nav-link dropdown-toggle m-auto" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['nombre'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mi perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../Controller/Cerrar.php" >Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</head>


<section class="col-md-10 m-auto">
    <div class="col-md-10 m-auto">

        <div class="row m-auto col-md-12">
            <div class="col-sm-3 m-auto">
                <h3>Canales de chat</h3>
            </div>
            <div class="col-sm-3 m-auto">
                <section>
                    <!-- BOTON MODAL -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Agregar nuevo canal
                    </button>
                    <!-- CONTENIDO MODAL -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content col-12">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registre el nuevo canal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                <section class="col-md-12 ">
                                    <div class="modal-body">
                                    <form method="POST" class="" action="../Controller/insertar.php">
                                        <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <label for="canal">Nombre del canal</label>
                                            <input type="text" class="form-control" name="txtcanal">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Selecione tipo de chat</label>
                                            <div class="ml-5">
                                            <input class="form-check-input" type="radio" name="radiochat" id="radiochat2" value="1">
                                            <label class="form-check-label" for="exampleRadios2">Chat privado</label>
                                            <br>
                                            <input class="form-check-input" type="radio" name="radiochat" id="radiochat2" value="2">
                                            <label class="form-check-label" for="exampleRadios2">Chat grupal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer m-auto">
                                        <input type="submit" name="registrar" class="btn btn-primary" value="Registrar"></input>
                                        <input type="hidden" name="val" value="1">
                                        <a class="btn btn-danger" href="../View/index.php">Cancelar</a>
                                    </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div> 
        </div>
        <hr>
        <table class="col-md-10 m-auto" style="text-align:center">
            <tr>
                <td><h4>Nombre del canal</h4></td>
                <td><h4>Fecha de creacion</h4></td>
                <td><h4>Opciones</h4></td>
            </tr>
            <?php foreach ($chats as $chat) { ?>
            <tr>
                <td><?php echo $chat->nombre ?></td>
                <td><?php echo $chat->fecha ?></td>
                <td>
                    <a class="btn btn-warning" href="#" id="ingresarcanal" name="ingresarcanal">Ingresar al canal</a>
                    <a class="btn btn-danger" href="../Controller/eliminar.php?id=<?php echo $chat->id ?>" >Eliminar canal</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</section>
    









</body>
</html>