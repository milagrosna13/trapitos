<?php  
namespace App\Models;
use CodeIgniter\Model;

class Vdetalle_model extends Model{
    protected $table      = 'ventas_detalle';
    protected $primaryKey = 'id_detalle';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['venta_id', 'producto_id' ,'cantidad', 'precio','total'];

    protected $useTimestamps = false;
    protected $createdField  = '' ;//'created_at';
    protected $updatedField  = '' ;//'updated_at';
    protected $deletedField  = '' ;//'deleted_at';

    protected $validationRules    = [

    ];

    protected $validationMessages = [
 
    ];
    protected $skipValidation     = false;


    public function getDetalleFactura($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_cabecera');
        $builder->select('');
        $builder->join('ventas_detalle', 'ventas_detalle.id_detalle = ventas_cabecera.id_cabeza');
        $builder->join('productos', 'productos.producto_id = ventas_detalle.producto_id');
        $query= $builder->where('ventas_cabecera.id_venta', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
             
}