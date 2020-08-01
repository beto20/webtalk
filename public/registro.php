  <?php
    include('layouts/layout.php');
  ?>


<?php
  
  if(isset($_POST['registrar'])) {
    require('../Model/Usuario.php');
    $objUsuario = new Usuario;
    $objUsuario->setUsuario($_POST['txtusuario']);

    $hash_pass = password_hash($_POST['txtpass'],PASSWORD_DEFAULT);
    $objUsuario->setPass($hash_pass);
    $objUsuario->setNom_ape($_POST['txtnom_ape']);
    $objUsuario->setCorreo($_POST['txtcorreo']);
    $objUsuario->setCargo($_POST['txtcargo']);
    $objUsuario->setEstado('Activo');
    if ($objUsuario->registrar()) {
      //echo 'Resgitrado';
      header('Location: ../public/login.php');
    }else {
      echo 'error';
    }
  }

?>

<section class="col-md-12">
  <div class="row registro-room">
    <form method="post" role="form" class="col-8 offset-2 mt-5" action="">
    <h2>Registro</h2>
    <br>
      <div class="form-row" >
        <div class="form-group col-md-6">
          <label for="nomape">Nombres y apellidos</label>
          <input type="text" class="form-control" name="txtnom_ape" id="txtnom_ape" placeholder="Nombres y apellidos">
        </div>
        <div class="form-group col-md-6">
          <label for="usuario">Nombre de usuario</label>
          <input type="text" class="form-control" name="txtusuario" id="txtusuario" placeholder="Correo">
        </div>
        <div class="form-group col-md-6">
          <label for="contraseña">Contraseña</label>
          <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Contraseña">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="correo">Correo</label>
          <input type="email" class="form-control" name="txtcorreo" id="txtcorreo" placeholder="Correo">
        </div>
        <div class="form-group col-md-6">
          <label for="cargo">Cargo</label>
          <input type="text" class="form-control" name="txtcargo" id="txtcargo" placeholder="Cargo">
        </div>
      </div>
      <input type="submit" name="registrar" id="registrar" class="btn btn-primary" value="Registrar"></input>
      <a class="btn btn-danger" href="../public/index.php">Cancelar</a>
    </form>
  </div>
</section>


  <?php
    include('layouts/footer.php');
   ?>
