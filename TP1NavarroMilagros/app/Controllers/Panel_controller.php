<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Panel_controller extends Controller {
	
	public function index(){
		$session = session();
		$nombre=$session->get('nombre');
		$dato['titulo']='panel de usuarios';

		echo view('front/header',$dato);
		echo view('front/navbar');
		echo view('back/usuario/panelvista');
		echo view('front/footer');

		
	}
}