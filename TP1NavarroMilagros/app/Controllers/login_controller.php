<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_Model;

class login_controller extends Controller{

	public function index()
	{
		helper(['form','url']);
		 $data['titulo']='login'; 
        echo view('front/header',$data);
        echo view('front/navbar');
         echo view('back/login/login');
          echo view('front/footer');
	}
	public function auth()
	{
		$session = session();
		$model = new Usuarios_Model();
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$data= $model->where('email',$email)->first();
		if($data && $data['baja']=='NO') {
			$pass= $data ['password'];
			$verify_password=password_verify($password, $pass);
			if($verify_password){
				$ses_data = [
					'id' => $data['id'],
					'nombre' => $data['nombre'],
					'apellido' => $data['apellido'],
					'email' => $data['email'],
					'usuario' => $data['usuario'],
					'perfil_id' => $data['perfil_id'],

					'logged_in' => TRUE 
                ];
                $session->set ($ses_data);
                return redirect()->to('panel');
			}else{
				$session->setFlashdata ('msg', 'Contraseña incorrecta');
                return redirect()->to('/login_controller');
				
			}

		}else{
			$session->setFlashdata('msg', 'Email no encontrado');
			return redirect()->to('/login_controller');
		}
	}
	public function logout(){
		$session =session();
		$session->destroy();
		return redirect()->to('/login_controller');
		
	}
}
