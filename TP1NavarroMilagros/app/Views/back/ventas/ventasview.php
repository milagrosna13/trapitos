<div id="animal" >

<table class="table table-warning table-striped-columns " style="margin-bottom: 170px">

    <?php
    use CodeIgniter\Database\Query;
    $session = session();
                        
                     ?>
    <thead>
        <br>
        <br>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">total</th>
            <th></th>
         
        </tr>
    </thead>
    <tbody>


        <?php foreach($ventas as $consulta){ ?>
            
            
            <tr>
                <th scope="row"><?php echo $consulta['venta_id']; ?></th>
                <td><?php echo $consulta['producto_id']; ?></td>
                <td><?php echo $consulta['cantidad']; ?></td>
                <td><?php echo $consulta['precio']; ?></td>
                <td><?php echo $consulta['total']; ?></td>
                
                <td>
                
                
               
                            
                            </td>
                            
                            </tr>
                            <?php } 
     ?>


    </tbody>

</table>
</div>