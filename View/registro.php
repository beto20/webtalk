  <?php
    include('layouts/layout.php');
  ?>


<?php
  

  /*
  if(isset($_POST['registrar'])) {
    require('../Model/Usuario.php');
    $objUsuario = new Usuario;
    $objUsuario->setUsuario($_POST['txtusuario']);
    $objUsuario->setContraseña($_POST['txtcontraseña']);
    $objUsuario->setNom_ape($_POST['txtnom_ape']);
    $objUsuario->setCorreo($_POST['txtcorreo']);
    $objUsuario->setCargo($_POST['txtcargo']);
    $objUsuario->setEstado('Activo');
    if ($objUsuario->registrar()) {
      echo 'Resgitrado';
    }else {
      echo 'error';
    }
  }

*/

?>









  <section>
    <form method="POST" class="col-8 offset-2 mt-5" action="../Controller/agregar.php">
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
          <input type="password" class="form-control" name="txtcontraseña" id="txtcontraseña" placeholder="Contraseña">
        </div>

      </div>
      <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" name="txtcorreo" id="txtcorreo" placeholder="Correo">
      </div>
      <div class="form-group ">
        <label for="cargo">Cargo</label>
        <input type="text" class="form-control" name="txtcargo" id="txtcargo" placeholder="Cargo">
      </div>

      <input type="submit" name="registrar" id="registrar" class="btn btn-primary" value="Registrar"></input>
      <input type="hidden" name="val" value="1">
      <a class="btn btn-danger" href="../View/index.php">Cancelar</a>
    </form>
  </section>




  <?php
    include('layouts/footer.php');
   ?>
