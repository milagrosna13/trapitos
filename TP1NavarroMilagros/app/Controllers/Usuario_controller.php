<?php
namespace App\Controllers;
Use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller{

	public function __construct(){
           helper(['form', 'url']);

	}
   
    public function create() {
         $data['titulo']='Registro'; 
        echo view('front/header',$data);
        echo view('front/navbar');
         echo view('back/usuario/registrarse');
          echo view('front/footer');
     
    }
 
    public function formValidation() {
          //helper(['form', 'url']);
        
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'password'     => 'required|min_length[3]|max_length[10]'
        ]);
        $formModel = new Usuarios_model();
 
        if (!$input) {
               $data['titulo']='Registro'; 
                echo view('front/header',$data);
                echo view('front/navbar');
                echo view('back/usuario/registrarse', [
                'validation' => $this->validator
            ]);
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'email'  => $this->request->getVar('email'),
                'usuario' => $this->request->getVar('usuario'),
                //'password'  => $this->request->getVar('password'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                
            ]);  
              return $this->response->redirect(site_url('login'));
        }
    }


    public function dashboard(){
        
        $data['titulo']='Registro';
            
         return view('front/header', $data).view('front/navbar').view('front/enviado',).view('front/footer');
        
    }

     public function dashboard_usuario(){
        $data['titulo']='Registro';
        return view('front/header', $data).view('front/navbar',).view('front/main').view('front/footer');
    }
}
