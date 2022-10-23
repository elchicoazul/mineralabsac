<?php

namespace App\Controllers;
use App\Models\ClienteModel;
use App\Models\TipoclienteModel;

class ClienteController extends BaseController
{
    public function index()
    {
        $TipCategoria = new TipoclienteModel();
        $tip=$TipCategoria->Listar();
       
        $Categoria = new ClienteModel();
        $mensaje = session('mensaje');
        $datos=$Categoria->Listar();
        $data =[
            "datos" => $datos,
            "Tipo" => $tip,
            "mensaje" => $mensaje

        ];
        return view('Cliente/index',$data);
    }
    public function getClientes(){
        $Cliente = new ClienteModel();
        $dbClientes = $Cliente->listar();
        echo json_encode($dbClientes);
        
    }
    public function insertar(){
       
        $datos =[
        
            "id_tipocliente"     => $_POST['TipoCliente'],
            "nombre"     => $_POST['Nombre'],
            "dni"     => $_POST['DNI'],
            "direccion"     => $_POST['Direccion'],
            "rol"     => $_POST['Rol'],
            "descripcion"     => $_POST['Descripcion'],
        
        ];
        $Categoria = new ClienteModel();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Cliente');

        }else{
            return redirect()->to(base_url().'/Cliente');

        }
        
    }
}