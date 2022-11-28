<div id="animal">
<div class="container"> 
    <div class="well">
      <h6 style=" margin-top: 25px; font-size: 40px;color: #DC143C; text-align: center;">Todos los productos</h6>
    </div>  

    <a type="button" class="btn btn-success" href="<?php echo base_url('produ-form'); ?>">Agregar Poducto</a>
    <a type="button" class="btn btn-danger" href="<?php echo base_url('productoseliminados'); ?>">Productos eliminados</a>
    
    <br> <br>
    <table class="table table-bordered"  style="background-color: #DC143C); ">

      <thead style="color: green; background-color: #00BFFF;">
        <tr>
          <th>ID</th>
          <th>Producto</th>
           <th>Categoria</th>
          <th>Precio</th>
          <th>Precio vta</th>
          <th>Stock</th>
           <th>Eliminado</th>
          <th>Imagen</th>

          <th>Opciones</th>
        </tr>
      </thead>
      <tbody style="color: green;  background-color: skyblue">
       <div class="container">
        
       <?php if($producto):?>
            <?php foreach($producto as $prod):?>
              <?php if ($prod['eliminado']=='NO'):?>
                <tr>
                    <td><?= $prod['id'];?></td>
                    <td><?= $prod['nombre_prod'];?></td>
                     <td><?= $prod['categoria_id'];?></td>
                    <td><?= $prod['precio'];?></td>
                    <td><?= $prod['precio_vta'];?></td>
                    <td><?= $prod['stock'];?></td>
                    <td><?= $prod['eliminado'];?></td>

                    <?php $img = $prod['imagen'];?>
                    <?php $id=$prod['id'];?>
                    <td> <img width="100px" src="<?=base_url()?>/public/assets/uploads/<?=$img?>"></td>
                    <td>
                    <a style="color: white" href="<?=base_url('editar/'.$prod['id']) ; ?>" class="btn btn-success">Editar</a>
          
          <a style="color: white" href=" <?=base_url('borrar/' .$prod['id']) ; ?>" class= "btn btn-danger" >Eliminar</a>
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