<?php
namespace App\Models;

use CodeIgniter\Model;

class carrito_Model extends Model{


	protected $table = 'ventas_detalle';
	protected $primaryKey= 'id_detalle';
	protected $allowedFields =['venta_id','cantidad','precio','total','producto_id'];

	//protected $table = 'ventas_cabecera';
	//protected $primaryKey= 'id_cabeza';
	//protected $allowedFields =['fecha', 'usuario_id', 'total_venta'];

	 public function insert_venta($data)
  {
     $db = \Config\Database::connect();
     $cart = \Config\Services::cart();
      
    $db->table('ventas_cabecera')->insert($data);
    
   
  }


  public function insert_venta_detalle($data)
  {
     $db = \Config\Database::connect();
     $cart = \Config\Services::cart();
   
$db->table('ventas_detalle')->insert($data);
   
  }
    function get_stock_producto($id)
    {
         $db = \Config\Database::connect();
      $db->select('stock');
            $db->from('productos');
            $db->where('id_producto', $id);
            $consulta = $db->get();
            $resultado = $consulta->row();
            //return $resultado;

      //  $query = $this->db->get_where('productos', array('id_producto' => $id));
        
        if($query->num_rows()>0) {
            return $resultado;
        } else {
            return FALSE;
        }        
    }

	
}

