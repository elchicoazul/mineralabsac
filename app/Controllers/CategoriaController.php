<?php

namespace App\Controllers;
use App\Models\CategoriaModel;

class CategoriaController extends BaseController
{
    public function index()
    {
        $Categoria = new CategoriaModel();
        $datos=$Categoria->Listar();
        $mensaje = session('mensaje');
        $data =[
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Categoria/index',$data);
    }
    public function insertar(){
       
        $datos =[
        
            "nombre"     => $_POST['Nombre'],
            "tipo"     => $_POST['Tipo'],
        
        ];
        $Categoria = new CategoriaModel();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Categoria')->with('mensaje', '1');

        }else{
            return redirect()->to(base_url().'/Categoria')->with('mensaje', '0');

        }
        
    }
    public function obtener($idtipo)
    {
        $data = ["id_categoria" => $idtipo];
        $seccion = new CategoriaModel();
        $respuesta = $seccion->ObtenerbyId($data);
        $mensaje = session('mensaje');
        $datos = ["datos" => $respuesta,
        "mensaje" => $mensaje
    
    ];

        return view('Categoria/actualizar', $datos);
    }
    public function actualizar()
    {
        $mensaje = session('mensaje');
        $datos = [
            "nombre"     => $_POST['Nombre'],
            "tipo"     => $_POST['Tipo'],
            
        ];

        $seccion = new CategoriaModel();
        $idSeccion = $_POST['id_categoria'];
        $respuesta = $seccion->actualizar($datos, $idSeccion);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Categoria/'. $_POST['id_categoria'])->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/Categoria/'. $_POST['id_categoria'])->with('mensaje', '3');
        }
    }
    public function estado($idSeccion, $estado)
    {   
        $est = 0;
        if($estado == 1){
            $est = 0;
        } else {
            $est = 1;
        }
        $mensaje = session('mensaje');
        $datos = [
            "estado"     => $est,
            
        ];

        $seccion = new CategoriaModel();
       // $idSeccion = $_POST['id_categoria'];
        $respuesta = $seccion->actualizar($datos, $idSeccion);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Categoria/')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/Categoria/')->with('mensaje', '3');
        }
    }
}