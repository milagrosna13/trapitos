<link rel="stylesheet" href="public/css/estilo.css">
<div id="animal">
  <div class="row pt-5">
    <div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

    <div class="col"> <!-- COLUMNA CENTRAL GRID -->

      <div class="row pt-5">
        <div class="col-md-12"> 

          <?php if (!$producto) { ?>

            <div class="container-Fluid">
              <div class="well">
                <h2 class="text-center tit">No hay Productos</h1>
                </div>  
              </div>

            <?php } else { ?>

              <div class="row pt-5">
                <h3 class="text-center pb-5 h1"> Nuestros Productos</h3>


              </div>

              <div class="container-Fluid">

                <div class="row text-center d-flex justify-content-center " >
                  <?php foreach($producto as $row ){ 

                     ?>
                      <?php if ($row['eliminado']=='NO') {
                    $img = $row['imagen'];?>
                    

                    <div class="col-sm" style="font-size: 20px; ">

                      <hr>

                      <div class="card profile-card-4 mb-5 " >
                        <img height="300px" width="300px" src="<?=base_url()?>/public/assets/uploads/<?=$img?>"/> 
                        <div class="card-body">

                          <p class="subtitulo"> 
                            <?php 
                            if($row['stock'] == 0){
                              echo '<span class="badge badge-danger" style=" font-size: 15px;">Sin Stock</span>';
                            } elseif ($row['stock_min'] >= $row['stock']) {
                              echo '<span class="badge badge-warning" style="font-size: 15px;"> Últimas unidades </span>';
                            } else {
                             echo '<span class="badge badge-success" style="font-size: 15px;">Hay Stock</span>';
                           }
                           ?>
                         </p>
                         <p class="subtitulo">Precio: $ <?php echo $row['precio_vta'] ?> </p>
                         <p class="subtitulo">
                          <?php 

                          if ($row['stock'] < $row['stock_min'] && $row['stock'] > 0) {
                            echo 'Por debajo del valor minimo: '.$row['stock_min'].' unidades';
                          } elseif ($row['stock'] == 0) {
                            echo 'No hay unidades disponibles';
                          }else {
                            echo 'Disponible: '.$row['stock'].' unidades';
                          }
                          ?>
                        </p>
                        <p>
                          <?php 
                          helper('form');
                          if (($row['stock'] > 0) ) {

                // Envia los datos en forma de formulario para agregar al carrito
                            echo form_open('carrito_agrega');
                            echo form_hidden('carrito_agrega');

                            echo form_hidden('id', $row['id']);
                             echo form_hidden('stock',$row['stock']);

                            echo form_hidden('precio_vta', $row['precio_vta']);
                            echo form_hidden('nombre_prod', $row['nombre_prod']);
                            ?>
                            <div>
                              <?php
                              $btn = array(
                                'class' => 'btn btn-info ',
                                'value' => 'Agregar al Carrito',
                                'name' => 'action',
                              );

                              echo form_submit($btn);
                              echo form_close();
                              ?>
                            </div>
                            <?php 


                          }
                          ?>  
                        </p>

                      </div>
                    </div>
                  
                  </div>
<?php } ?>
                <?php } ?>  
              </div>
              <hr>
            </div>
          <?php } ?>
 
        </div>
      </div>


    </div>  <!-- FIN DE COLUMNA CENTRAL GRID -->
    
    <div class="col-md-1"></div> <!-- COLUMNA DCHA. GRID -->
  </div>  
</div>