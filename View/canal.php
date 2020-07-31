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
    print_r($mensajes);


    //print_r($usuarios);
/*
    foreach ($usuarios as $u) {
        echo ' '.$u->nom_ape.', ';
        echo ' '.$u->correo.' ,';
        echo ' '.$u->cargo.'<br>';
    }
*/
    //print_r($_SESSION['usuario']);
    //print_r($usuarios);
    
    $keyid = $_SESSION['id'];
    //echo $key;
    echo '<input type="hidden" id="canalId" name="canalId" value="'.$IdCanal.'">';
    echo '<input type="hidden" name="usuarioId" id="usuarioId" value=" '.$keyid.' ">';
    echo '<div>'.$_SESSION['nombre'].'</div>';
    echo '<div>'.$_SESSION['correo'].'</div>';
    echo '<div>'.$_SESSION['cargo'].'</div>';
        
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



<div class="col-md-8">
    <div id="mensaje">
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
            <input type="button" value="Enviar" class="btn btn-success btn-block" id="enviar" name="enviar">
        </div>
    </form>
</div>

<div>
    <a type="button" href="../View/home.php" class="btn btn-danger" id="salir" name="salir" value="Salir">Salir</a>
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