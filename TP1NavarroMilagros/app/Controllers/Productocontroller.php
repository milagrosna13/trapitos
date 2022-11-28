<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use CodeIgniter\Controller;

class Productocontroller extends Controller{
	public function index(){
		$productoModel = new Producto_Model();
		$data['producto']=$productoModel ->orderBy('id', 'DESC')->findAll(); 
		$dato ['titulo']='Crud_productos';
		echo view('front/header',$dato);
		echo view('front/navbar');
		echo view('back/productos/producto_nuevo_view',$data);
		echo view('front/footer');
	}
	public function crearproducto(){
		$userModel =new Producto_Model();
		$data ['obj']=$userModel ->orderBy('id', 'DESC')->findAll();
		$dato['titulo']='Alta producto';
		echo view ('front/header', $dato);
		echo view('front/navbar');
		echo view ('back/productos/alta_producto_view', $data);
		echo view('front/footer');
	}
	public function store(){
		$productoModel= new Producto_Model();
		$input = $this->validate([
			'nombre_prod' =>'required|min_length[2]',
			'categoria_id'=>'is_not_unique[categorias.id]',
			'precio' =>'required',
			'precio_vta'=>'required',
			'stock'=> 'required',
			'stock_min'=> 'required',
			 'imagen' => 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]',
		]);
		$productoModel= new Producto_Model();
		if(!$input){
			$data['titulo']='Alta';
			echo view('front/header', $data);
			echo view('front/navbar');
			echo view('back/productos/alta_producto_view',['validation'=>$this->validator]);
		}else{
			$img = $this->request->getFile('imagen');
			$nombre_aleatorio = $img->getRandomName();
			$img ->move(ROOTPATH. 'public/assets/uploads',$nombre_aleatorio);
			$data = [
				'nombre_prod' =>$this->request->getVar('nombre_prod'),
				
				//
			'categoria_id'=>$this->request->getVar('categoria_id'),
			'precio' =>$this->request->getVar('precio'),
			'precio_vta'=>$this->request->getVar('precio_vta'),
			'stock'=> $this->request->getVar('stock'),
			'stock_min'=> $this->request->getVar('stock_min'),
			'imagen'=>$img->getName(),
			];
			
			$productoModel->insert($data);
			return $this->response->redirect(site_url('crear'));
		}
	}
	public function singleProducto($id=null){
		$productoModel =new Producto_Model();
		$data ['old']=$productoModel ->where('id', $id)->first();
		$dato['titulo']='Crud_productos';

		echo view ('front/header', $dato);
		echo view('front/navbar');
		echo view ('back/productos/modificaproducto', $data);
		echo view('front/footer');

	}
		//update user data
	public function modifica($id){
		
		$productoModel =new Producto_Model();
		$id=$productoModel ->where('id', $id)->first();

		$img =$this->request->getFile('imagen');
		$nombre_aleatorio = $img->getRandomName();
		$img ->move(ROOTPATH. 'public/assets/uploads',$nombre_aleatorio);
		$data=[
			'nombre_prod' =>$this->request->getVar('nombre_prod'),
				
				//
			'categoria_id'=>$this->request->getVar('categoria_id'),

			'precio' =>$this->request->getVar('precio'),
			'precio_vta'=>$this->request->getVar('precio_vta'),
			'stock'=> $this->request->getVar('stock'),
			'stock_min'=> $this->request->getVar('stock_min'),
			'eliminado'=> $this->request->getVar('eliminado'),
			'imagen'=>$img->getName(),

		];
		
		$productoModel->update($id,$data);
		return $this->response->redirect(site_url('crear'));
	}

	public function productos_eliminados(){
		$productoModel = new Producto_Model();
		$data['producto']=$productoModel ->orderBy('id', 'DESC')->findAll(); 
		$dato ['titulo']='Productos_eliminados';
		echo view('front/header',$dato);
		echo view('front/navbar');
		echo view('back/productos/productos_eliminados',$data);
		echo view('front/footer');
	}
		//delete user
	public function deleteproducto($id = null){
		$productoModel =new Producto_Model();
		$data ['producto']=$productoModel->where('id', $id)->delete($id);
		return $this->response->redirect(site_url('crear'));
	}
	public function deletelogico($id = null){
		$productoModel =new Producto_model();
		$data ['eliminado']= $productoModel ->where('id', $id)->first();
		$data['eliminado']='SI';
		$productoModel->update($id, $data);
		return $this->response->redirect(site_url('crear'));
	}

}