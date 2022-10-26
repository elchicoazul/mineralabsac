<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\CajaModel;
use App\Models\ClienteModel;

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
    public function login()
    {
        
        return view('Login/login');
    }
    public function iniciar()
    {
        $cliente = new ClienteModel();
        $rpta = $cliente->login($_POST['Dni'],$_POST['Descripcion']);
        if ($rpta) {
            
            $Usuarioi =[ "Cliente"=>$rpta,

            ];
            $session = session();
            $session->set($Usuarioi);
            return redirect()->to(base_url().'/Dashboard')->with('mensaje', '9');
        } else {
            return redirect()->to(base_url())->with('mensaje', '10');
        }
        
    }
}

		
			