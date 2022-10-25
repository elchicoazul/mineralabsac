<?php

namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\SubCategoriaModel;

class SubCategoriaController extends BaseController
{
    public function index()
    {
        $Categoria = new CategoriaModel();
        $datos=$Categoria->Listar();
        $SubCategoria = new SubCategoriaModel();
        $Subdatos=$SubCategoria->Listar();
        $mensaje = session('mensaje');
        $data =[
            "datos" => $datos,
            "Subdatos" => $Subdatos,
            "mensaje" => $mensaje
        ];
        return view('SubCategoria/index',$data);
    }
    public function insertar(){
       
        $datos =[
        
            "nombre"     => $_POST['Nombre'],
            "id_categoria"     => $_POST['Tipo'],
        
        ];
        $Categoria = new SubCategoriaModel();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/SubCategoria')->with('mensaje', '1');

        }else{
            return redirect()->to(base_url().'/SubCategoria')->with('mensaje', '0');

        }
        
    }
}