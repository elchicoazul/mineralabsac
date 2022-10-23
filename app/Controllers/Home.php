<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\CajaModel;

class Home extends BaseController
{
    public function index()
    {
        $cja = new CajaModel();
        $dbcaja = $cja->Listare();
        $Menu = new CategoriaModel();
		$data= $Menu->Listar();
        $datos =[ "caja"=>$dbcaja,

        ];
		$menuCliente =[ "MenuDashboardCliente"=>$data,

        ];
            $session = session();
            $session->set($menuCliente);
        return view('welcome_message',$datos);
    }
}

		
			