<?php
namespace App\Models;

use CodeIgniter\Model;

class Producto_Model extends Model{

	protected $table = 'productos';
	protected $primaryKey= 'id';
	protected $allowedFields =['nombre_prod', 'categoria_id','precio','precio_vta','stock','stock_min','imagen' ,'eliminado'];

}

