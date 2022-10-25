<?php

namespace App\Controllers;
use App\Models\ClienteModel;
use App\Models\ProgramadosModel;
use App\Models\CategoriaModel;
use App\Models\SubCategoriaModel;


class ProgramadosController extends BaseController
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
        $SubCat = new SubCategoriaModel();
        $SubConsulta=["id_categoria" => $id];
        $SubCate=$SubCat->ListarbyCat($id);
        $mensaje = session('mensaje');
        $data =[
            "datos" => $Clie,
            "Programas" => $Pro,
            "Catego" => $Cate,
            "subcaja" => $SubCate,
            "idcat" => $id,
            "mensaje" => $mensaje
        ];
        return view('Programados/index',$data);
    }
    public function insertar(){
       
        $datos =[
        
            "id_cliente"     => $_POST['Id_Cliente'],
            "id_categoria"     => $_POST['Categoria'],
            "id_subcategoria"     => $_POST['id_subcategoria'],
            /*"movimiento"     => $_POST['Movimiento'],*/
            "montos"     => $_POST['Montos'],
            "montod"     => $_POST['Montod'],
            "descripcion"     => $_POST['Descripcion'],
        
        ];
        $Categoria = new ProgramadosModel();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Programados/'.$_POST['Categoria'])->with('mensaje', '1');

        }else{
            return redirect()->to(base_url().'/Programados/'.$_POST['Categoria'])->with('mensaje', '0');

        }
        
    }
}