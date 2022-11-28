<!DOCTYPE html>
<html>

<head>
  <title>Modifica Usuario</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/estilo.css">
  <style> .container {
    max-width: 500px;
  }
  .fondo{
  	background-color: blue;
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

<?php if (!$ventas) { ?>  

	<div class="container" >
		<div class="well">
			<h1>No hay Detalle compra</h1>
		</div>	
	</div>

<?php } else { ?>
<div id="fondo">
	<div class="container">
		<div class="well">
			<h1>Detalle Compras</h1>
		</div>	

		<table class="table table-info table-bordered" style="margin-bottom: 200px; max-width: 700px">
			<thead>
				<tr>
					<th>Venta ID</th>
					<th>Fecha</th>
					<th>Total</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $row){ ?>
				<tr>
				    <td><?php echo $row['id_cabeza'];  ?></td>
					<td><?php echo $row['fecha'];  ?></td>
					<td><?php echo $row['total_venta'];  ?></td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>
</div>
<?php } ?>

</body>
</html>