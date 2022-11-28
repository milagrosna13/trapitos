<div id="animal">
<div class="container mt-1 mb-0">
	<div class="card" style="width: 50%;" >
		<div class= "card-header text-center">
			<h2>Agregar Producto</h2>
		</div>
	
 <?php $validation = \Config\Services::validation(); ?>
     <form method="post"enctype='multipart/form-data' action="<?php echo base_url('/enviar-prod') ?>">
 
<div class ="card-body" media="(max-width:768px)">
	<div class="mb-2">
 	 <label for="exampleFormControlInput1" class="form-label">Producto</label>
 	 <input name="nombre_prod" type="text"  class="form-control" placeholder="nombre_prod" >
     <!-- Error -->
        <?php if($validation->getError('nombre_prod')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('nombre_prod'); ?>
            </div>
        <?php }?>
	</div>
	<div class="mb-3">
 	 <label for="exampleFormControlTextarea1" class="form-label">Categoria</label>
 	  <input type="int" name="categoria_id"class="form-control" placeholder="categoria_id" >
 	  <!-- Error -->
        <?php if($validation->getError('categoria_id')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('categoria_id'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    	 <label for="exampleFormControlInput1" class="form-label">Precio</label>
 	 <input name="precio"  type="double" class="form-control"  placeholder="precio" >
 	  <!-- Error -->
        <?php if($validation->getError('precio')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('precio'); ?>
            </div>
        <?php }?>
	</div>
 	  <div class="mb-3">
 	<label for="exampleFormControlInput1" class="form-label">Precio Venta</label>
 	 <input  tyupe="double" name="precio_vta" class="form-control" placeholder="precio_vta">
 	 <!-- Error -->
        <?php if($validation->getError('precio_vta')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('precio_vta'); ?>
            </div>
        <?php }?>
	</div>
	
	<div class="mb-3">
 	 <label for="exampleFormControlInput1" class="form-label">Stock</label>
 	 <input name="stock" type="int" class="form-control"  placeholder="stock">
 	 <!-- Error -->
        <?php if($validation->getError('stock')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('stock'); ?>
            </div>
        <?php }?>
 	</div>
  <div class="mb-3">
   <label for="exampleFormControlInput1" class="form-label">Stock minimo</label>
   <input name="stock_min" type="int" class="form-control"  placeholder="stock_min">
   <!-- Error -->
        <?php if($validation->getError('stock_min')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('stock_min'); ?>
            </div>
        <?php }?>
  </div>
  
      

<div class="col-12 col-sm-6">
                    <label> IMAGEN </label>
                    <input class="form-control" id="imagen" name="imagen" type="file"  required> 
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>