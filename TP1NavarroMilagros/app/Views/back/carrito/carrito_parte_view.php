<div id="animal">
<div class="conteiner "> 
<div class="row">

<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

<div class="col"> <!-- COLUMNA CENTRAL GRID -->
	<div class="row">
		<div class="col-md-12" id="carrito"> 
			
		    <div class="cart" >
		        <div class = "heading">

		            <h2 class="tit text-center pt-5 " style=" margin-top: 25px; font-size: 40px;color: #DC143C; text-align: center;" id="h2" align="center">Productos en tu Carrito</h2>
		        </div>
		        
		        <div class="text ml-2 " style="    font-size: 25px;" align="center"> 

		            <?php 
		            $session =session();
		            $cart=\Config\Services::Cart();
		            $cart = $cart->contents();
		            // Si el carrito está vacio, mostrar el siguiente mensaje
		            if (empty($cart)) 
		            {
		     
		                echo 'Para agregar productos al carrito, click en "Catalogo"';
		            }  
		            ?> 
		            <br><br>
		            
		        </div>
		        
		        <table class="table table-hover table-info table-responsive-md" style=" margin-bottom: 180px;" border="0" cellpadding="5px" cellspacing="1px">

		            <?php // Todos los items de carrito en "$cart". 
		            if ($cart == TRUE): //Esta función devuelve un array de los elementos agregados en el carro
		  
		            ?>
		                <tr class="text-center fuenteTabla" id= "main_heading">
		                    <td>ID</td>
		                    <td>Descripción</td>
		                    <td>Precio</td>
		                    <td>Cantidad</td>
		                    <td>Subtotal</td>
		                    <td>Total</td>
		                    <td></td>
		                </tr>

		            <?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito
		            echo form_open('carrito_actualiza');
		                $gran_total = 0;
		                $i = 1;

		                 foreach ($cart as $item):
		                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
		                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
		                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
		                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
		                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
		            		?>
		                    <tr class="text-center fuenteTabla">
		                        <td>
		                            <?php echo $i++; ?>
		                        </td>
		                        <td>
		                            <?php echo $item['name']; ?>
		                        </td>
		                        <td>
		                            $ <?php echo number_format($item['price'], 2); ?>
		                        </td>
		                         <td> 
                                    <a href="<?= base_url("prodRestar?id=" . $item["rowid"])?>">-</a>
                                    <?= $item["qty"] ?>
                                    <a href="<?= base_url("prodAumentar ?id=" . $item["rowid"])?>">+</a>
                                </td>
		                            <?php $gran_total = $gran_total + $item['subtotal']; ?>
		                        <td>
		                            $ <?php echo number_format($item['subtotal'], 2) ?>
		                        </td>



		                        <td class="text-center"><a href="<?php  echo base_url('borrar?rowid='.$item['rowid']); ?>" class="btn btn-secondary"><i class="fa-solid fa-xmark"></i>Eliminar</a></td>

		                        <td> 
		                            <?php // Imagen
		                                //$path = '<img src= '. base_url('img/cart_cross.jpg') . ' width="25px" height="20px">';
		                            	$path = '<i class="far fa-times-circle fa-2x" style="color:Red"></i>';

		                                echo anchor('borrar/' . $item['rowid'], $path); 
		                            ?>
		                        </td>

		                    </tr>
		                <?php 
		                endforeach; 
		                ?>
		                    
		                <tr>  
		                    <td colspan="5"> </td>

		                    <td class="text-center"> 
		                    	<b>Total: $
		                            <?php //Gran Total
		                            echo number_format($gran_total, 2); 
		                            ?>
		                        </b>
		                    </td> <td></td>
		                </tr>

		                <tr class="table-info">


                          
		                	<td> </td>
		                	 <td> </td>
		                	   <td> </td>
		                	   <td> </td>
		                	   
		                	  


		                	<td class="text-center">
			                	<!-- Borrar carrito usa mensaje de confirmacion javascript implementado en partes/head_view -->
			                	 <input type="button" class ='btn btn-danger ' value="Borrar Carrito" onclick="window.location = 'eliminarcarro' ">
			                	</td>

			                	<td class="text-center">

			                	 <input type="button" class ='btn btn-success  btn-md ' value="Confirmar Orden" onclick="window.location = 'comprar' "> 
			                </td>
			               <td></td>
		                </tr>

		                <?php echo form_close();
		            endif; ?>
		        </table>

		        <div class="text-center">

			        
		        </div>
		    </div>
			
			<br>
									
		</div>
	</div>

</div>	<!-- FIN DE COLUMNA CENTRAL GRID -->

<div class="col-md-1"></div> <!-- COLUMNA DCHA. GRID -->

</div>	
</div>
</div>