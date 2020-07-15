  <?php
    include('layouts/layout.php');
  ?>

  <section>

    <form method="POST" class="col-8 offset-2 mt-5">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nomuser">Nombre de usuario</label>
        <input type="text" class="form-control" id="nomuser" placeholder="Nombre de usuario">
      </div>
      <div class="form-group col-md-6">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" placeholder="Correo">
      </div>
      <div class="form-group col-md-6">
        <label for="contraseña">Password</label>
        <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Iniciar sesion</button>
    <button type="submit" class="btn btn-danger">Cancelar</button>
  </form>


  </section>




  <?php
    include('layouts/footer.php');
   ?>
