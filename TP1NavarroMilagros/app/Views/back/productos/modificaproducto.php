<!DOCTYPE html>
<html>

<head>
  <title>Modifica producto</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/estilo.css">
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
  <div id="animal">
<div class="container mt-1 mb-0">
<div class="card" style="width: 100%;" >
<div class= "card-header text-center">
<h2>Modifica Producto</h2>
</div>

 <?php $validation = \Config\Services::validation(); ?>
     <form method="post"enctype='multipart/form-data' action="<?php echo base_url('modifica/'.$old['id']) ?>">
 
<div class ="card-body" media="(max-width:768px)">
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Producto</label>
  <input type="text" name="nombre_prod" class="form-control" value="<?php echo $old['nombre_prod']; ?>">
     
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Categoria</label>
   <input type="int" name="categoria_id" class="form-control" value="<?php echo $old['categoria_id']; ?>">
   
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Precio</label>
   <input type="float" name="precio" class="form-control" value="<?php echo $old['precio']; ?>">
   <!-- Error -->
       
</div>
   <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Precio Venta</label>
  <input type="float" name="precio_vta" class="form-control" value="<?php echo $old['precio_vta']; ?>">
  <!-
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Stock</label>
  <input type="int" name="stock" class="form-control" value="<?php echo $old['stock']; ?>">
  <!-- Error -->
        
  </div>
  <div class="mb-3">
   <label for="exampleFormControlInput1" class="form-label">Stock minimo</label>
   <input type="int" name="stock_min" class="form-control" value="<?php echo $old['stock_min']; ?>">
   <!-- Error -->
      
          </div>

   <div class="form-group">
      <label>baja</label>
      <input type="text" name="eliminado" class="form-control" value="<?php echo $old['eliminado']; ?>">
    </div>
 
     

 <div class="col-12 col-sm-6">
                    <label> Seleccione Imagen nuevamente  </label>

                    <input name="imagen" id="imagen" type="file" class="form-control" placeholder="Imagen" value="<?php echo $old['imagen']; ?> ">
                    <img width="100px" src="<?=base_url()?>/public/assets/uploads/<?=$old['imagen']?>">
                    <?php 
                        if(isset($errores["imagen"]) ){
                            echo "<div class='errores'>".$errores["imagen"]."</div>";
                        }
                    ?>
                    
                </div>
            <div>
                <a href=" <?php echo base_url("/crear"); ?> " class="m-2 rounded-pill btn btn-warning">CANCELAR</a>
                 <input type="submit" value="guardar" class="btn btn-success">
            </div>
   </div>
 </form>
</div>
</div>
</div>

 
</body>
