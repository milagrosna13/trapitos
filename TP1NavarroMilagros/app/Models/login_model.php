<?php
namespace App\Models;
use CodeIgniter\Model;
class login_model extends Model
{
	protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'password','perfil_id','baja'];
}