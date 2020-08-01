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
	
    <style type="text/css">
		#mensaje {
			height: 200px;
			background: whitesmoke;
			overflow: auto;
		}
		#chatsala {
			margin-top: 10px;
		}
	</style>
</head>
<body>

<?php
    session_start();
    require('../Model/Usuario.php');
    require('../Model/Mensaje.php');
    $objUsuario = new Usuario;
    $IdCanal = $_GET['id'];
    $usuarios = $objUsuario->userXcanal($IdCanal);
    $mensajes = $objUsuario->userXmensaje($IdCanal);
    //print_r($mensajes);
    $keyid = $_SESSION['id'];
    //echo $key;
?>




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
                    <a class="nav-link m-auto" ><?php date_default_timezone_set("America/Lima"); echo date('d-m-Y G:i')?></a>
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












<div class="col-md-12">
    <div class="row">
        <div class="col-md-4 ml-5">
            <?php

                echo '<input type="hidden" id="canalId" name="canalId" value="'.$IdCanal.'">';
                echo '<input type="hidden" name="usuarioId" id="usuarioId" value=" '.$keyid.' ">';
                echo '<div>Correo: '.$_SESSION['correo'].'</div>';
                echo '<div>Cargo: '.$_SESSION['cargo'].'</div>';
                
                    
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Usuarios en el chat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($usuarios as $key => $u) {
                            echo '<tr><td> '.$u->nom_ape.'</td>';
                            echo '<td>'.$u->correo.'</td>';
                            echo '<td>'.$u->cargo.'</td></tr>';
                        }
                    ?>
                </tbody>
            </table>

            <div>
                <a type="button" href="../public/home.php" class="btn btn-danger" id="salir" name="salir" value="Salir">Salir</a>

                <section>
                    <!-- BOTON MODAL -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Agregar nuevo participante
                    </button>
                    <!-- CONTENIDO MODAL -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content col-12">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registre al nuevo participante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                <section >
                                    <div class="modal-body">
                                    <form method="POST" class="" action="../Controller/insertar.php">
                                        <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <label for="canal">Nombre</label>
                                            <input type="text" class="form-control" name="txtcanal">
                                        </div>
                                      
                                    </div>
                                    <div class="modal-footer m-auto">
                                        <input type="submit" name="registrar" class="btn btn-primary" value="Registrar"></input>
                                        <input type="hidden" name="val" value="1">
                                        <a class="btn btn-danger" href="../public/canal.php?id=<?php echo $chat->id ?>">Cancelar</a>
                                    </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <div class="col-md-7 ml-2">
            <div id="mensaje" style="height:600px;">
                <table id="chats" class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="4" scope="col"><strong>Chat</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($mensajes as $key => $msg) {
                                if($keyid == $msg->id) {
                                    $from = "Yo";
                                } else {
                                    $from = $msg->nom_ape;
                                }
                                echo '<tr><td valign="top"><div><strong>'.$from.'</strong></div><div>'.$msg->mensaje.'</div><td align="right" valign="top">'.date("d/m/Y h:i:s A", strtotime($msg->fecha)).'</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <form id="chatsala" method="post" action="">
                <div class="form-group">
                    <textarea class="form-control" id="msg" name="msg" placeholder="Ingrese algun mensaje"></textarea>
                </div>
                <div class="form-group">
                    <input type="button" value="Enviar" class="btn btn-primary btn-block" id="enviar" name="enviar">
                </div>
            </form>
        </div>
    </div>
</div>


</body>
<script type="text/javascript">
    $(document).ready(function(){
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            console.log(e.data);
            
            var data = JSON.parse(e.data);
            var row = '<tr><td valign="top"><div><strong>' + data.from +'</strong></div><div>'+data.msg+'</div><td align="right" valign="top">'+data.fecha+'</td></tr>';
            $('#chats > tbody').prepend(row);
        };

        conn.onclose = function(e) {
			console.log("Connection Closed!");
        }
        
        $("#enviar").click(function(){
            var canalId = $("#canalId").val()
            var usuarioId = $("#usuarioId").val();
            var msg = $("#msg").val();
            var data = {
                canalId: canalId,
                usuarioId: usuarioId,
                msg: msg
            }
            conn.send(JSON.stringify(data));
            $("#msg").val('');
        });
        $("#salir").click(function(){
            conn.close();
        })

    })

</script>


</html>