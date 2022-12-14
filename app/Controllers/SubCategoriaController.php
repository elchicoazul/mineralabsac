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
    public function obtener($idtipo)
    {
        $data = ["id_subcategoria" => $idtipo];
        $seccion = new SubCategoriaModel();
        $respuesta = $seccion->ObtenerbyId($data);
        $mensaje = session('mensaje');
        $datos = ["datos" => $respuesta,

                  "mensaje" => $mensaje
    ];

       


        return view('SubCategoria/actualizar', $datos);
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
            return redirect()->to(base_url() . '/SubCategoria/'. $_POST['id_subcategoria'])->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/SubCategoria/'. $_POST['id_subcategoria'])->with('mensaje', '3');
        }
    }
    public function eliminar($idSeccion)
    {
        $almacen = new SubCategoriaModel();
        $data = ["id_subcategoria" => $idSeccion];

        $respuesta = $almacen->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url() . '/SubCategoria')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/SubCategoria')->with('mensaje', '5');
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

        $seccion = new SubCategoriaModel();
       // $idSeccion = $_POST['id_categoria'];
        $respuesta = $seccion->actualizar($datos, $idSeccion);

        if ($respuesta) {
            return redirect()->to(base_url() . '/SubCategoria/')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/SubCategoria/')->with('mensaje', '3');
        }
    }
}