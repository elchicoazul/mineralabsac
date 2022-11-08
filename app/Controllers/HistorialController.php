<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\CajaModel;
use App\Models\ClienteModel;
use App\Models\HistorialModel;

class HistorialController extends BaseController
{
    public function index()
    {
        foreach (session('Cliente')as $key): 
        $id=$key->id_cliente;
        endforeach; 
        
        //$cja = new HistorialModel();
        //$dbcaja = $cja->Listare();
        $Menu = new HistorialModel();
		$data= $Menu->Listar($id);
        $datos =[ "historial"=>$data,
        


        ];
		
        return view('Historial/Index',$datos);
    }
   
}

		
			