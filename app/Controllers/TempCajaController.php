<?php

namespace App\Controllers;
use App\Models\ClienteModel;
use App\Models\ProgramadosModel;
use App\Models\CategoriaModel;

class TempCajaController extends BaseController
{
    public function index($id)
    {
        $Progrma = new ProgramadosModel();
        $Pro=$Progrma->Listar();
        $Cat = new CategoriaModel();
        $Consulta=["id_categoria" => $id];
        $Cate=$Cat->ObtenerbyId($Consulta);
        $Cliente = new ClienteModel();
        $Clie=$Cliente->Listar();
        $mensaje = session('mensaje');
        $data =[
            "datos" => $Clie,
            "Programas" => $Pro,
            "Catego" => $Cate,
            "mensaje" => $mensaje

        ];
        return view('Programados/index',$data);
    }
    public function insertar(){
       
        $datos =[
        
            "id_cliente"     => $_POST['Cliente'],
            "id_categoria"     => $_POST['Categoria'],
            /*"movimiento"     => $_POST['Movimiento'],*/
            "montos"     => $_POST['Montos'],
            "montod"     => $_POST['Montod'],
            "descripcion"     => $_POST['Descripcion'],
        
        ];
        $Categoria = new ProgramadosModel();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Progrmados');

        }else{
            return redirect()->to(base_url().'/Progrmados');

        }
        
    }
}