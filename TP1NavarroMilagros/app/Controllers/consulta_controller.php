<?php

namespace App\Controllers;
Use App\Models\consulta_model;


$db = \Config\Database::connect();
use CodeIgniter\Controller;
//$session = \Config\Services::session($config);

class Consulta_controller extends BaseController
{
   

    public function __construct(){
        helper(['form', 'url']);
        $this->consulta = new consulta_model();
        $this->session = session();
        
    }
 
    public function agregar_consulta(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $db = \Config\Database::connect();
           
            $consulta_model = new Consulta_model();
            $datos =[
                //'id' => $this->request->getPostGet('id'),
                'nombre' => $this->request->getPostGet('nombre'),
                'email' => $this->request->getPostGet('email'),
                'mensaje' => $this->request->getPostGet('mensaje'),

            ];
             $consulta_model->insert($datos);
            return $this->response->redirect(site_url('dashboard'));
        }
    }



    

    public function ver_consulta(){
        $consulta_model = new Consulta_model();
        $data['titulo'] = 'Consultas';
    
        $datos['consultas'] = $consulta_model->orderBy('id','asc')->findAll();
        //return view('front/head2',$data).view('front/titulo').view('front/navbar_adm'). view('back/consulta/ver_consulta',$datos).view('front/footer');
        echo view('front/header',$data);
        
        echo view('front/navbar');
        echo view('back/consulta/consultaview',$datos);
        echo view('front/footer');
    }


    public function contestar_consulta(){
        
            $consultas_estado = new Consulta_model();
            //$user_consulta = new Usuarios_models(); //PK consulta  Contra CP usuario
            $estado = ['contestado' => 'SI'];
            $consultas_estado->update($this->request->getPostGet('id'),$estado);
           

       return $this->response->redirect(site_url('consultas'));
    }



}