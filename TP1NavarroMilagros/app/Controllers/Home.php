<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('front/header');
        echo view('front/navbar');
        echo view('front/main');
        echo view('front/footer');

    }
    public function sobre_nosotros()
    {
        echo view('front/header');
        echo view('front/navbar');
        echo view('front/sobre_nosotros');
       echo view('front/footer');

    }
   
    public function comercializacion(){

    	echo view('front/header');
        echo view('front/navbar');
        echo view('front/comercializacion');
        echo view('front/footer');
    }
     public function terminosyuso(){

    	echo view('front/header');
        echo view('front/navbar');
        echo view('front/terminosyuso');
        echo view('front/footer');
    }
     public function contacto(){

    	echo view('front/header');
        echo view('front/navbar');
        echo view('front/contacto');
        echo view('front/footer');
    }
    public function login(){

        echo view('front/header');
        echo view('front/navbar');
        echo view('back/login/login');
        echo view('front/footer');
    }
   

}
