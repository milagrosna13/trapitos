<!DOCTYPE html>
<html>

<head>
  <title>Modifica Usuario</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style> .container {
    max-width: 500px;
  }

  .error {
    display: block;
    padding-top: 5px;
    font-size: 14px;
    color: red;
  }
</style>
</head>

<body>

  
  <div class="container mt-5">
<div id="animal">
    <h1>MODIFICA USUARIO</h1>

    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update') ?>">
    <input type="hidden" name="id" id="id" value="<?php echo $old['id']; ?>">

    <div class="form-group">
      <label>Nombre</label>
      <input type="text" name="nombre" class="form-control" value="<?php echo $old['nombre']; ?>">
    </div>

    <div class="form-group">
      <label>Apellido</label>
      <input type="text" name="apellido" class="form-control" value="<?php echo $old['apellido']; ?>">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $old['email']; ?>">
    </div>

    <div class="form-group">
      <label>Usuario</label>
      <input type="text" name="usuario" class="form-control" value="<?php echo $old['usuario']; ?>">
    </div>
    <div class="form-group">
      <label>perfil id</label>
      <input type="text" name="perfil_id" class="form-control" value="<?php echo $old['perfil_id']; ?>">
    </div>
    <div class="form-group">
      <label>baja</label>
      <input type="text" name="baja" class="form-control" value="<?php echo $old['baja']; ?>">
    </div>
     






    <div class="form-group">
      <button type="submit"  class="btn btn-warning">Enviar</button>
    </div>
  </form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

<script>
  if ($("#update_user").length > 0) {
    $("#update_user").validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
          maxlength: 60,
          email: true,
        },
      },
      messages: {
        name: {
          required: "Name is required.",
        },
        email: {
          required: "Email is required.",
          email: "It does not seem to be a valid email.",
          maxlength: "The email should be or equal to 60 chars.",
        },
      },
    })
  }
</script>
</body>

</html>

