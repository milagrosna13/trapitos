<div id="animal">
<?php  
if(!$users ){ ?>
 
  <div class="container" >
    <div class="well">
      <h1>No hay Usuarios</h1>
    </div>
    <?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
    
      <br> <br>
    <?php } ?>  
  </div>

<?php } else { ?>

  <div class="container"> 
    <div class="well">
      <h6 style=" margin-top: 25px; font-size: 40px;color: #DC143C; text-align: center;">Todos los Usuarios</h6>
    </div>  

    <a type="button" class="btn btn-success" href="<?php echo base_url('users-form'); ?>">Agregar Usuario</a>
     <a type="button" class="btn btn-danger" href="<?php echo base_url('usuarioseliminados'); ?>">Usuarios eliminados</a>
   
    <br> <br>
    <table class="table table-responsive table-bordered"  style="background-color: #DC143C); ">

      <thead style="color: green; background-color: #00BFFF;">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Usuario</th>
          <th>Baja</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody style="color: green;  background-color: skyblue">
       <div class="container">
        
       <?php if($users):?>
            <?php foreach($users as $lib):?>
               <?php if ($lib['baja']=='NO'):?>
                <tr>
                    <td><?= $lib['id'];?></td>
                    <td><?= $lib['nombre'];?></td>
                    <td><?= $lib['apellido'];?></td>
                    <td><?= $lib['email'];?></td>
                    <td><?= $lib['usuario'];?></td>
                    <td><?= $lib['baja'];?></td>
                    <td>

                    <a style="color: white" href="<?=base_url('edit-view/'.$lib['id']) ; ?>" class="btn btn-success">Editar</a>
          
          <a style="color: white" href=" <?=base_url('deletelogico/' .$lib['id']) ; ?>" class= "btn btn-danger" >Eliminar</a>
        </td>
                </tr>
                   <?php endif; ?>
            <?php endforeach; ?>
       <?php endif; ?>
      </div>
        </tbody> 
      </table>              
    </div>
</div>
    <?php } ?>