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
    public function obtener($idtipo)
    {
        $data = ["id_tipocliente" => $idtipo];
        $seccion = new TipoclienteModel();
        $respuesta = $seccion->ObtenerbyId($data);

        $datos = ["datos" => $respuesta];

        return view('Tipocliente/actualizar', $datos);
    }
    public function actualizar()
    {
        $datos = [
            "nombre"     => $_POST['Nombre'],
            "descripcion"     => $_POST['Descripcion'],
        ];

        $seccion = new TipoclienteModel();
        $idSeccion = $_POST['id_tipocliente'];
        $respuesta = $seccion->actualizar($datos, $idSeccion);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Tipocliente/'. $_POST['id_tipocliente'])->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/Tipocliente/'. $_POST['id_tipocliente'])->with('mensaje', '3');
        }
    }
    public function eliminar($idSeccion)
    {
        $almacen = new SeccionesModel();
        $data = ["idSeccion" => $idSeccion];

        $respuesta = $almacen->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Tipocliente')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/Tipocliente')->with('mensaje', '5');
        }
    }
}