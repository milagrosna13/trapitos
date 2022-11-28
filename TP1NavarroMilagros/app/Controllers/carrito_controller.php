<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Usuarios_Model;
use App\Models\vdetalle_model;
use CodeIgniter\Controller;

class Carrito_controller extends BaseController{
	public function construct(){
		helper(['form','url','cart']);
		$session=session();
		$cart=\Config\Services::Cart();
		$cart->contents();
		if($cart== null){
			$cart=['cart_total'=>0,'total_items'=>0];
		}log_message('info', 'Cart Class initialized');
	}

	
	public function index(){
		
	}
	public function catalogo(){
		$session =session();
		$dato= array('titulo'=>'todos los productos');
		$productoModel = new Producto_Model();
		$data['producto']=$productoModel->orderBy('id','Desc')->findAll();


		echo view ('front/header', $dato);
		echo view('front/navbar');
		echo view ('back/carrito/productos_catalogo_view', $data);
		echo view('front/footer');
	}
	public function carrocompra(){
		$session =session();
		$cart=\Config\Services::Cart();
		$productoModel= new Producto_Model();
		$data['producto']=$productoModel->findAll();
		$data['cart']=$this->request->getvar('cart');

		$dato= array('titulo'=>'todos los productos');
		

		echo view('front/header', $data);
		echo view('front/navbar');
		echo view('back/carrito/carrito_parte_view');
		echo view('front/footer');
	}
	public function add(){
		$cart=\Config\Services::Cart();
		$request=\Config\Services::request();
		$cart->insert(array(
			'id'=>$request->getPost('id'),
			'qty'=>1,
			'price'=>$request->getPost('precio_vta'),
			'name'=>$request->getPost('nombre_prod'),

		));
		return redirect()->route("muestro");

	}

	public function sumarProd(){
	$cart=\Config\Services::cart();

	$producto = $cart->getItem($_GET["id"]);
	$cart->update([
		"rowid" => $_GET["id"],
		"qty" => $producto["qty"]+1
	]);
	
	return redirect()->route("muestro");
  }

  public function restarProd(){
	$cart=\Config\Services::cart();

	$producto = $cart->getItem($_GET["id"]);
	if($producto["qty"] > 1){
		$cart->update([
			"rowid" => $_GET["id"],
			"qty" => $producto["qty"]-1
		]);
	}
	return redirect()->route("muestro");
  }





		//update user data
	public function actualiza_carrito(){

		$cart=\Config\Services::Cart();
		$request=\Config\Services::request();
		$cart->insert(array(
			'id'=>$request->getPost('id'),
			'qty'=>1,
			'price'=>$request->getPost('precio_vta'),
			'name'=>$request->getPost('nombre_prod'),
			

		));
		return redirect()->back()->withInput();

	}
	public function muestra(){

		helper(['form', 'url', 'cart']);
		$cart=\Config\Services::cart();
		$cart=$cart->contents();
		$dato= array( 'titulo'=> 'Confirmar compra');

		$session= session();
		$nombre =$session->get('nombre');
		$perfil_id= $session->get('perfi_id');
		$email= $session->get('email');

		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/carrito/carrito_parte_view');
		echo view('front/footer');

	}


	public function eliminar_carrito(){
		$request = \Config\Services::request();
		$cart = \Config\Services::cart();

		$rowid = $request->getPostGet('rowid');

		$cart ->remove($rowid);

		return redirect()->route('muestro');

			//id = id del producto
			//rowid = fila del producto
	}

		//delete user
	public function borrarcarrito(){
		$cart=\Config\Services::cart();
		$cart->destroy();
		return $this->response->redirect(site_url('muestro'));

	}


	

}