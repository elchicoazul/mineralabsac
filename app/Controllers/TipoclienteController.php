<?php

namespace App\Controllers;
use App\Models\TipoclienteModel;

class Tipoclientecontroller extends BaseController
{
    public function index()
    {
        $Categoria = new TipoclienteModel();
        $datos=$Categoria->Listar();
        $mensaje = session('mensaje');
        $data =[
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Tipocliente/index',$data);
    }
    public function insertar(){
       
        $datos =[
        
            "nombre"     => $_POST['Nombre'],
            "descripcion"     => $_POST['Descripcion'],
        
        ];
        $Categoria = new TipoclienteModel();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Tipocliente')->with('mensaje', '1');

        }else{
            return redirect()->to(base_url().'/Tipocliente')->with('mensaje', '0');

        }
        
    }
}