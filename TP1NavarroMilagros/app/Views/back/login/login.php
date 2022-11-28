<body>
	<div id="animal">
<div class="container">

<div class="row justify-content-md-center mt-5">

<div class="col-6">

<h1 >Login</h1>

<?php if(session()->getFlashdata('msg')):?>
<div class="alert alert-danger"><?= session()->getflashdata('msg') ?></div>

<?php endif;?>



<form action="<?php echo base_url('enviarlogin'); ?>" method="post"style=" margin-bottom: 80px; ">

<div class="mb-3">

<label for="InputForEmail" class="form-label">Email address</label> 
<input type="email" name="email" class="form-control" id="InputForEmail">

</div>

<div class="mb-3">

<label for="InputForPassword" class="form-label">Password</label> 
<input type="password" name="password" class="form-control" id=" InputForPassword">

</div>

<button type="submit" class="btn btn-primary">Enviar</button>

<button type="reset" class="btn btn-danger">cancelar</button>

</form>

</div>

</div> </div>
</div>