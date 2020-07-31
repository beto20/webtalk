<?php
  include('layouts/layout.php');

?>




<?php
  if(isset($_POST['enviar'])) {
    session_start();
    require('../Model/Usuario.php');
    $objUsuario = new Usuario;
    $usuario = $_POST['txtusuario'];
    $pass = $_POST['txtpass'];
    if ($objUsuario->iniciarsesion($usuario,$pass)) {
      //echo 'correcto';
      header('Location: ../View/home.php');
    }else {
      echo 'error';
    }
  }


?>






<section class="col-md-12" >
  <form method="POST" class="col-8 offset-2 mt-5" action="">
    <h2>Inicio de sesión</h2>
    <br>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="usuario">Nombre de usuario</label>
        <input type="text" class="form-control"  name="txtusuario" placeholder="Nombre de usuario">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="contraseña">Contraseña</label>
        <input type="password" class="form-control" name="txtpass" placeholder="Contraseña">
      </div>
    </div>
    <input class="btn btn-success" type="submit" name="enviar" id="enviar" value="Iniciar sesion">
    <a class="btn btn-danger" href="../View/index.php">Cancelar</a>
  </form>
</section>


<?php
  include('layouts/footer.php');
?>
