<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\Producto_model;
Use App\Models\Usuarios_model;
Use App\Models\vcabecera_model;

Use App\Models\vdetalle_model;
class venta_controller extends BaseController{
    public function __construct(){
        helper(['form', 'url']);
        $db = \Config\Database::connect();
        //$id_vc = $db->table('ventas_cabecera');
        $this->session = session();
    } 

      
public function comprar(){
        //Primera parte: encabezado de venta: idVenta(autoinc), idCliente, fecha, 
        $venta = new vcabecera_model(); //instancio el modelo de la cabecera
        $detalle = new vdetalle_model(); //instancio el modelo del cuerpo de la factura
        $producto = new Producto_model();
        $cart = \Config\Services::cart(); //instancio un carrito
        $request = \Config\Services::request();
        
        $data = array(
            'usuario_id'=> session('id'),
            'fecha' => date('y-m-d'),
            'total_venta' => $cart->total(),
        );
        $venta_id = $venta->insert($data); 
        
       
        
        //segunda parte: cuerpo de la factura (detalle) 

        $cart1 = $cart->contents();
        //var_dump($cart1);
        foreach ($cart1 as $item){
            $detalleVenta = array(
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio' => $item['price'],
                'total' => $cart->total()
            );
        
          $productoStock = $producto->where('id', $item['id'])->first();
         //Controlar el stock (si existe stock del producto entonces agregar)
         
        
         
         if(  $item['qty'] <= $productoStock['stock']){

             
            $data=[
                'stock' => $productoStock['stock'] - $item['qty'],
            ];

            $producto->update($item['id'], $data);
            $detalle->insert($detalleVenta);

        $cart->destroy();
       
            return redirect()-> route('exitosa');
            
         }else{


             echo 'no hay stock del producto id: '. $item['id'];
             return redirect()-> route('rechazCompra');
       
       
             

         }
        
         
        }
    }

     public function ventamsj(){
        
        $data['titulo']='Venta';
            
         return view('front/header', $data).view('front/navbar').view('back/carrito/compraexitosa',).view('front/footer');
        
    }
    public function rechazadaCompra(){
        
        $data['titulo']='Venta';
            
         return view('front/header', $data).view('front/navbar').view('back/carrito/rechazada',).view('front/footer');
        
    }
    public function micompra($id){
        //Me conecto a la base de datos
        $db = db_connect();
        //Me ubico en la tabla ventas_cabecera y genero un alias "u" y guardo su contenido en $bluider
        $builder = $db->table('ventas_cabecera u');
        
        //Filtro las ventas para que solo rescate las ventas de este Cliente mediante su id.
        $builder->where('usuario_id',$id);
        //Selecciono de ambas tablas (Cabecera y Detalle) los campos que necesito mostrar en la vista
        $builder->select('u.id_cabeza , u.total_venta , u.fecha');

        //Con un Join relaciono los "id" de ambas tablas para generar una sola con todos los datos
        $builder->join('usuarios d','u.usuario_id = d.id');

        

        //Guardo el contenido de la relacion de ambas tablas en la variable $ventas
        $ventas= $builder->get();
        //Vuelvo a guardar toda la info pero en la forma de un array para mejor manejo.
        $datos['ventas']=$ventas->getResultArray();
        //print_r($datos);
        //exit;
        
        $data['titulo']='Listado de Compras'; 
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('back/usuario/micompra',$datos);
        echo view('front/footer');
    }

public function ver_ventas(){

    $session= session();

   $id=$session->get('id');

        $db = db_connect();
        //Me ubico en la tabla ventas_cabecera y genero un alias "u" y guardo su contenido en $bluider
        $builder = $db->table('ventas_detalle u');
        
        //Filtro las ventas para que solo rescate las ventas de este Cliente mediante su id.
        
        //Selecciono de ambas tablas (Cabecera y Detalle) los campos que necesito mostrar en la vista
        $builder->select('u.venta_id, u.producto_id , u.cantidad ,u.precio, u.total');

        //Con un Join relaciono los "id" de ambas tablas para generar una sola con todos los datos
        

        

        //Guardo el contenido de la relacion de ambas tablas en la variable $ventas
        $ventas= $builder->get();
        //Vuelvo a guardar toda la info pero en la forma de un array para mejor manejo.
        $datos['ventas']=$ventas->getResultArray();
        //print_r($datos);
        //exit;
        
        $data['titulo']='Listado de Compras'; 
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('back/ventas/ventasview',$datos);
        echo view('front/footer');
    }



}
