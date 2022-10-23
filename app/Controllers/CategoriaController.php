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
}