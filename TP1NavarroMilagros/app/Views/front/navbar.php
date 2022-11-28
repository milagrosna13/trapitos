

<!-- NAVBAR-->

<!-- barra de navegacion -->
<?php $session= session();
$nombre= $session->get('nombre');
$perfil=$session->get('perfil_id');
$id=$session->get('id');?>
<nav class="navbar navbar-expand-sm navbar-dark bg-danger">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="public/assets/img/logo1.png" alt="" width="100"></a>
        <button class="navbar-toggler" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar"> 


     <!-- navbar para administrador -->
     <?php if($perfil =='1'){ ?>
      <ul class="navbar-nav me-auto mb-2 ">
        <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="<?php echo base_url ('');?>">INICIO</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('userlist');?>">CRUD Usuarios</a>

        </li>
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('crear');?>">CRUD Productos</a>

        </li>
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('/ventas');?>">Ventas</a>

        </li>
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('/consultas');?>">Consultas</a>

        </li>
         <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('todos');?>">CATALOGO</a>

        </li>
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('muestro');?>">Carrito</a>

        </li>

        
       
        <li class="nav-item ">
          <a class="nav-link " href="#" tabindex="-1" aria-disabled="true" ><?php echo "Bienvenido admin".$nombre?></a>

        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo base_url('logout');?>" tabindex="-1" aria-disabled="true">Cerrar Sesion</a>

        </li>
      </ul>
    
    <!-- navbar para clientes -->

  <?php } else if(($perfil == '2')){?>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 ">
        <li class= "nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url (''); ?> ">INICIO</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('todos');?>">CATALOGO</a>

        </li>
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('muestro');?>">Carrito</a>

        </li>
         <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?php echo base_url ('micompra/'.$id) ?>">Mis compras</a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('sobrenosotros');?>">Sobre nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('comercializacion');?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('contacto');?>">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('terminosyuso');?>">Términos y uso</a>
          </li>
        <li class="nav-item">
          <a class ="nav-link" href="#" tabindex = "-1" aria-disabled ="true"> <?php echo "Binvenido ".$nombre?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url ('logout');?>" tabindex="-1" aria-disabled="true"> Cerrar Sesion </a>
        </li>

      </ul>
    </div>
  <?php } else {?>
    <nav class="navbar navbar-expand-sm navbar-danger bg-danger">
      <div class="container-fluid">
        
        
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('');?>">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('sobrenosotros');?>">Sobre nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('comercializacion');?>">Comercialización</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('contacto');?>">Contacto</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('terminosyuso');?>">Términos y uso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('registrarse');?>">Registrarse</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('login');?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  

  <?php } ?>
</div>
</div>
</nav>


