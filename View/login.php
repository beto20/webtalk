  <?php
    include('layouts/layout.php');
    session_start();
    if (isset($_SESSION['nombre'])) {
      header('Location: ../View/home.php');
    }
  ?>

  <section>

    <form method="POST" class="col-8 offset-2 mt-5" action="../Controller/Validar.php">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="usuario">Nombre de usuario</label>
        <input type="text" class="form-control"  name="txtusuario" placeholder="Nombre de usuario">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="contraseña">Password</label>
        <input type="password" class="form-control" name="txtcontraseña" placeholder="Contraseña">
      </div>
    </div>
    <input class="btn btn-success" type="submit" name="enviar" value="Iniciar sesion">
    <a class="btn btn-danger" href="../View/index.php">Cancelar</a>
  </form>


  </section>




  <?php
    include('layouts/footer.php');
   ?>
