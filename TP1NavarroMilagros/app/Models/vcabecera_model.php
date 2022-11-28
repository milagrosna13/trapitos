<?php  
namespace App\Models;
use CodeIgniter\Model;

class Vcabecera_model extends Model{
    protected $table      = 'ventas_cabecera';
    protected $primaryKey = 'id_cabeza';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_cabeza', 'fecha', 'usuario_id', 'total_venta'];

    protected $useTimestamps = false;
    protected $createdField  = '';//'created_at';
    protected $updatedField  = '';//'updated_at';
    protected $deletedField  = '';//'deleted_at';

    protected $validationRules    = [

    ];

    protected $validationMessages = [
 
    ];
    protected $skipValidation     = false;

    public function getCabeceraFactura() {
        $db = \Config\Database::connect();
        $builder = $db->table('venta');
        $builder->select('');
        $builder->join('personas', 'personas.id_persona = venta.id_cliente');
        $query = $builder->get();
        return $query->getResultArray();
    }
}