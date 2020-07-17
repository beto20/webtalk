  <?php
    include('layouts/layout.php');
  ?>

  <section>

    <form method="POST" class="col-8 offset-2 mt-5" action="../modelo/comprueba_login.php">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nomuser">Nombre de usuario</label>
        <input type="text" class="form-control" id="nomuser" name="nomuser" placeholder="Nombre de usuario">
      </div>
      <div class="form-group col-md-6">
        <label for="contraseña">Password</label>
        <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña">
      </div>
    </div>
    <input type="submit" name="enviar" value="Iniciar sesion">
  </form>


  </section>




  <?php
    include('layouts/footer.php');
   ?>
