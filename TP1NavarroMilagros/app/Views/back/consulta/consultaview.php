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
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Mensaje</th>
            <th scope="col">Contestado</th>
            <th scope="col">Operacion</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach($consultas as $consulta){ ?>
            
            
            <tr>
                <th scope="row"><?php echo $consulta['id']; ?></th>
                <td><?php echo $consulta['nombre']; ?></td>
                <td><?php echo $consulta['email']; ?></td>
                <td><?php echo $consulta['mensaje']; ?></td>
                <td><?php echo $consulta['contestado']; ?></td>
                
                <td>
                
                
                <a href="<?php echo base_url(['consultas_contestado?id='.$consulta['id']]); ?> "
                class="btn btn-success btn-sm"> <i>
                        
                            
                            <h6 class="btn-sm">CONTESTADO</h6>
                            </i></a>
                            
                            </td>
                            
                            </tr>
                            <?php } 
     ?>


    </tbody>

</table>
</div>