<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class LibroController extends Controller{

  public function index() {

    $libros=new Libro();
    $datos['libros']=$libros->orderBy('id', 'ASC')->findAll();
    $datos['header']=view('templates/header');
    $datos['footer']=view('templates/footer');

    return view('libros/listar', $datos);
  }

  public function crear() {

    $datos['header']=view('templates/header');
    $datos['footer']=view('templates/footer');
    return view('libros/crear', $datos);
  }

  public function guardar() {

    $libro=new Libro();

    $validacion=$this->validate([
      'nombre'=>'required|min_length[3]',
      'imagen'=>[
        'uploaded[imagen]',
        'mime_in[imagen,image/jpg,image/jpeg,image/png]',
        'max_size[imagen,1024]',
      ]
    ]);
    if(!$validacion){
      $session=Session();
      $session->setFlashdata('message', 'Debe completar todos los campos.');
      return redirect()->back()->withInput();
    }

    $nombre = $this->request->getVar('nombre');
    $imagen=$this->request->getFile('imagen');
    if($imagen){
      $nuevoNombre=$imagen->getRandomName();
      $imagen->move('../public/uploads/', $nuevoNombre);
      $datos=[
        'imagen'=>$nuevoNombre,
        'nombre'=>$nombre
      ];
    }
    $libro->insert($datos);

    return $this->response->redirect(site_url('/listar'));
  }

  public function borrar($id=null){

    $libro=new Libro();
    $datoLibro=$libro->where('id',$id)->first();
    $ruta=('../public/uploads/'.$datoLibro['imagen']);
    if(file_exists($ruta)){
      unlink($ruta);
    }
    $libro->where('id',$id)->delete($id);  

    return $this->response->redirect(site_url('/listar'));
  }

  public function editar($id=null) {

    $libro=new Libro();
    $datoLibro=$libro->where('id',$id)->first();

    $datos['header']=view('templates/header');
    $datos['footer']=view('templates/footer');
    $datos['libro']=$datoLibro;

    return view('libros/editar', $datos);
  }

  public function actualizar() {

    $validacion=$this->validate([
      'nombre'=>'required|min_length[3]',
    ]);
    if(!$validacion){
      $session=Session();
      $session->setFlashdata('message', 'Debe completar todos los campos.');
      return redirect()->back()->withInput();
    }

    $libro=new Libro();
    $id=$this->request->getVar('id');
    $nombre=$this->request->getVar('nombre');
    $datos=[
      'nombre'=>$nombre,
    ];
    $libro->update($id, $datos);

    $validacion=$this->validate([
      'imagen'=>[
        'uploaded[imagen]',
        'mime_in[imagen,image/jpg,image/jpeg,image/png]',
        'max_size[imagen,1024]',
      ]
    ]);

    if($validacion){
      $datosLibro=$libro->where('id',$id)->first();
      $ruta=('../public/uploads/'.$datosLibro['imagen']);
      if(file_exists($ruta)){
        unlink($ruta);
      }

      $imagen=$this->request->getFile('imagen');
      if($imagen){
        $nuevoNombre=$imagen->getRandomName();
        $imagen->move('../public/uploads/', $nuevoNombre);
        $datos=[
          'imagen'=>$nuevoNombre,
        ];
        $libro->update($id, $datos);
      }
    }

    return $this->response->redirect(site_url('/listar'));
  }
}