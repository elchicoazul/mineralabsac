<?php

namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\SubCategoriaModel;
use App\Models\PredeterminadoModel;

class PreController extends BaseController
{
    public function index($id_sub)
    {
        /*$Categoria = new CategoriaModel();
        $datos=$Categoria->Listar();*/
        $SubCategoria = new PredeterminadoModel();
        $Subdatos=$SubCategoria->Listar();
        $mensaje = session('mensaje');
        $data =[
            //"datos" => $datos,
            "Subdatos" => $Subdatos,
            "mensaje" => $mensaje,
            "submen" => $id_sub
        ];
        return view('Predeterminado/index',$data);
    }
    public function insertar(){
       
        $datos =[
        
            "descripcion"     => $_POST['Nombre'],
            "id_subcategoria"     => $_POST['id_subcategoria'],
        
        ];
        $Categoria = new PredeterminadoModel();
        $respuesta= $Categoria->insertar($datos);
        /*
        if($respuesta>0){
            return redirect()->to(base_url().'/SubCategoria')->with('mensaje', '1');

        }else{
            return redirect()->to(base_url().'/SubCategoria')->with('mensaje', '0');

        }*/
        
    }
    public function obtener($idtipo)
    {
        $data = ["id_subcategoria" => $idtipo];
        $seccion = new SubCategoriaModel();
        $respuesta = $seccion->ObtenerbyId($data);
        $mensaje = session('mensaje');
        $datos = ["datos" => $respuesta,

                  "mensaje" => $mensaje
    ];

       


        return view('Pre/actualizar', $datos);
    }
    public function actualizar()
    {
        $datos = [
            "nombre"     => $_POST['Nombre'],
            "id_categoria"     => $_POST['Tipo'],
        ];

        $seccion = new SubCategoriaModel();
        $idSeccion = $_POST['id_subcategoria'];
        $respuesta = $seccion->actualizar($datos, $idSeccion);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Pre/'. $_POST['id_subcategoria'])->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/Pre/'. $_POST['id_subcategoria'])->with('mensaje', '3');
        }
    }
    public function eliminar($idSeccion)
    {
        $almacen = new SubCategoriaModel();
        $data = ["id_subcategoria" => $idSeccion];

        $respuesta = $almacen->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Pre')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/Pre')->with('mensaje', '5');
        }
    }
}