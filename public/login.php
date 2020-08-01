<?php
  include('layouts/layout.php');
  session_start();
  if (isset($_SESSION['nombre'])) {
    header('Location: ../public/home.php');
  }
?>






<section class="col-md-12" >
  <form method="POST" class="col-8 offset-2 mt-5" action="../Controller/Validar.php">
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
    <a class="btn btn-danger" href="../public/index.php">Cancelar</a>
  </form>
</section>


<?php
  include('layouts/footer.php');
?>
