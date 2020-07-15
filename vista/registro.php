  <?php
    include('layouts/layout.php');
  ?>

  <section>

    <form method="GET" class="col-8 offset-2 mt-5" action="">
    <div class="form-row" >
      <div class="form-group col-md-6">
        <label for="nomape">Nombres y apellidos</label>
        <input type="email" class="form-control" id="nomape" placeholder="Nombres y apellidos">
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
    <div class="form-group">
      <label for="nomuser">Nombre de usuario</label>
      <input type="text" class="form-control" id="nomuser" placeholder="Nombre de usuario">
    </div>
    <div class="form-group">
      <label for="cargo">Cargo</label>
      <input type="text" class="form-control" id="cargo" placeholder="Cargo">
    </div>

    <button type="submit" class="btn btn-primary">Registrase</button>
    <button type="submit" class="btn btn-danger">Cancelar</button>
  </form>


  </section>




  <?php
    include('layouts/footer.php');
   ?>
