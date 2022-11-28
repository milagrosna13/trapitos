<?php
namespace App\Controllers;
use App\Models\Usuarios_Model;
use CodeIgniter\Controller;

class Usuario_crud_controller extends Controller{

	public function index(){
		$userModel = new Usuarios_Model();
		$data['users']=$userModel ->orderBy('id', 'DESC')->findAll(); 
		$dato ['titulo']='Crud_usuarios';
		echo view('front/header',$dato);
		echo view('front/navbar');
		echo view('back/usuario/usuario_crud_view',$data);
		echo view('front/footer');
	}
	public function create(){
		$userModel =new Usuarios_Model();
		$data ['user_obj']=$userModel ->orderBy('id', 'DESC')->findAll();
		$dato['titulo']='Alta Usuario';
		echo view ('front/header', $dato);
		echo view('front/navbar');
		echo view ('back/usuario/usuario_crud_nuevo', $data);
		echo view('front/footer');
	}
	public function store(){
		$userModel= new Usuarios_Model();
		$input = $this->validate([
			'nombre' =>'required|min_length[3]',
			'apellido'=>'required|min_length[3]|max_length[25]',
			'email' =>'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
			'usuario'=>'required|min_length[3]',
			'password'=> 'required|min_length[3]|max_length[10]',
		]);
		$userModel= new Usuarios_Model();
		if(!$input){
			$data['titulo']='Moficacion';
			echo view('front/header', $data);
			echo view('front/navbar');
			echo view('back/usuario/usuario_crud_view',['validation'=>$this->validator]);
		}else{
			$data = [
				'nombre'=>$this->request->getVar('nombre'),
				'apellido'=> $this->request->getVar('apellido'),
				'usuario'=> $this->request->getVar('usuario'),
				'email'=>$this->request->getVar('email'),
				'password'=>password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			];
			$userModel->insert($data);
			return $this->response->redirect(site_url('userlist'));
		}
	}
	public function singleUser($id=null){
		$userModel =new Usuarios_Model();
		$data ['old']=$userModel ->where('id', $id)->first();
		$dato['titulo']='Crud_usuarios';

		echo view ('front/header', $dato);
		echo view('front/navbar');
		echo view ('back/usuario/modificausuarios', $data);
		echo view('front/footer');

	}
		//update user data
	public function update(){
		$userModel =new Usuarios_Model();


		$id =$this->request->getVar('id');
		$data=[
			'nombre'=>$this->request->getVar('nombre'),
			'apellido'=> $this->request->getVar('apellido'),
			'usuario'=> $this->request->getVar('usuario'),
			'email'=>$this->request->getVar('email'),
			'password'=>password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'perfil_id'=> $this->request->getVar('perfil_id'),
			'baja'=>$this->request->getVar('baja'),

		];

		$userModel->update($id,$data);
		return $this->response->redirect(site_url('userlist'));
	}

	public function usuarios_eliminados(){
		$userModel = new Usuarios_Model();
		$data['users']=$userModel ->orderBy('id', 'DESC')->findAll(); 
		$dato ['titulo']='eliminados usuario';
		echo view('front/header',$dato);
		echo view('front/navbar');
		echo view('back/usuario/eliminados_usuario',$data);
		echo view('front/footer');
	}

		//delete user
	public function delete($id = null){
		$userModel =new Usuarios_Model();
		$data ['usuario']=$userModel->where('id', $id)->delete($id);
		return $this->response->redirect(site_url('users-list'));
	}


	public function deletelogico($id = null){
		$userModel =new Usuarios_Model();
		$data ['baja']= $userModel ->where('id', $id)->first();
		$data['baja']='SI';
		$userModel->update($id, $data);
		return $this->response->redirect(site_url('userlist'));
	}



	//Rescato las ventas cabeceras de este cliente y muestro.
	
}

