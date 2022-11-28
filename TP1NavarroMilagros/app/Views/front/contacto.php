<div id="animal">
 <h3 class="text-center pt-5 h1"> Contacto</h3>
 <h5> Titular Navarro Milagros</h5>
 <h5> Nombre de marca: Trapitos</h5>
 <h5> Razón social: Trapitos petshop</h5>
 <h5>Atención Teléfonica: 0810-220-2345</h5>
 <h5>Domicilio legal: Av Rivadavia 3601 · Corrientes Capital, Corrientes, ARGENTINA.</h5>
 	<br></br>
 <h4>Si requieres de más información, no dudes en contactarnos y te contestaremos en menos de 12hs hábiles!
</h4>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
   <form class="row g-3 needs-validation" method="POST" action="<?php echo base_url("/agregar_consulta"); ?> " >
   	<div class="col-md-4">
   		<label for ="nombre" class="form-label"> nombre</label>
   	<input id="nombre" name="nombre" type="text" class="form-control" required>
   	<div class="valid-feedback">Campo Ok</div>
   	<div class="invalid-feedback">Complete los datos</div>
   </div>
   <div class="col-md-4">
   	<label for ="nombre" class="form-label"> apellido</label>
   	<input id="apellido" name="apellido" type="text" class="form-control" required>
   </div>

   <div class="col-md-4"> 
   	<label for ="nombre" class="form-label"> Email</label>
   	<div class="form-floating mb-1">
  <input id="email" name="email" type="email" class="form-control" placeholder="name@example.com" required>
  <label for="floatingInput">name@example.com</label>
</div>
   </div>
   <div class="form-floating">
    
   <textarea name="mensaje" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  <label for="exampleFormControlTextarea1" class="form-label">Comentarios</label>
</div>
   	<button type ="submit"class="btn btn-warning fw-bold">Enviar</button>
     <button type="reset" class="btn btn-primary">Limpiar!</button>
   </form>
</div>
</div>
</div>
</div>
</div>