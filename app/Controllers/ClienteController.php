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
            "rol"     => "Ninguna",
            "descripcion"     => $_POST['Descripcion'],
        
        ];
        $Categoria = new ClienteModel();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Cliente')->with('mensaje', '1');

        }else{
            return redirect()->to(base_url().'/Cliente')->with('mensaje', '0');

        }
        
    }
    public function obtener($idtipo)
    {
        $TipCategoria = new TipoclienteModel();
        $tip=$TipCategoria->Listar();
        $data = ["id_cliente" => $idtipo];
        $seccion = new ClienteModel();
        $respuesta = $seccion->ObtenerbyId($data);
        $datos=$seccion->Listar();
        $data = ["rpta" => $respuesta,
        "Tipo" => $tip,
        ];

        return view('Cliente/actualizar', $data);
    }
    public function actualizar()
    {
        $datos = [
            "nombre"     => $_POST['Nombre'],
            "id_categoria"     => $_POST['Tipo'],
        ];

        $seccion = new ClienteModel();
        $idSeccion = $_POST['id_cliente'];
        $respuesta = $seccion->actualizar($datos, $idSeccion);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Cliente/'. $_POST['id_subcategoria'])->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/Cliente/'. $_POST['id_subcategoria'])->with('mensaje', '3');
        }
    }
    public function eliminar($idSeccion)
    {
        $almacen = new ClienteModel();
        $data = ["id_cliente" => $idSeccion];

        $respuesta = $almacen->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Cliente')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/Cliente')->with('mensaje', '5');
        }
    }
}