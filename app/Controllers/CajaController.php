<?php

namespace App\Controllers;
use App\Models\CajaModel;
use App\Models\ClienteModel;
use App\Models\CategoriaModel;
use App\Models\SubCategoriaModel;
use App\Models\ProgramadosModel;
use App\Models\TempCajaModel;
use App\Models\DetalleModel;
class CajaController extends BaseController
{
    public function index($idCliente)
    {
        $temp =new TempCajaModel();
        $tmp_caja = $temp->resultado($idCliente);
        $programados = new ProgramadosModel();
        $fct=$programados->resultado($idCliente);
        $Clie = new ClienteModel();
        $Consulta=["id_cliente" => $idCliente];
        $Cl=$Clie->ObtenerbyId($Consulta);
        $Caja = new CajaModel();
        $datos=$Caja->Listar();
        $Cat = new CategoriaModel();
        $Cate=$Cat->Listar();
        $mensaje = session('mensaje');
        $data =[
            "datos" => $Cl,
            "caja" => $datos,
            "Catego" => $Cate,
            "Programas" => $fct,
            "temp_caja" =>$tmp_caja,
            "mensaje" => $mensaje
        ];

        return view('Caja/index',$data);
    }
    public function cajas($idCategoria)
    {
        $temp =new TempCajaModel();
        $tmp_caja = $temp->resultado($idCategoria);
        $programados = new ProgramadosModel();
        $fct=$programados->resultado($idCategoria);
        $Clie = new ClienteModel();
        $Cl=$Clie->Listar();
        $Caja = new CajaModel();
        $datos=$Caja->Listar();
        $Cat = new CategoriaModel();
        $Consulta=["id_categoria" => $idCategoria];
        $Cate=$Cat->ObtenerbyId($Consulta);
        $SubCat = new SubCategoriaModel();
        $SubConsulta=["id_categoria" => $idCategoria];
        $SubCate=$SubCat->ListarbyCat($idCategoria);
        $data =[
            "datos" => $Cl,
            "caja" => $datos,
            "subcaja" => $SubCate,
            "Catego" => $Cate,
            "Programas" => $fct,
            "temp_caja" =>$tmp_caja,
            "idcat"=>$idCategoria,
        ];

        return view('Caja/cajas',$data);
    }
    public function reporte() {
        $idCategoria=1;
        $temp =new TempCajaModel();
        $tmp_caja = $temp->resultado($idCategoria);
        $programados = new ProgramadosModel();
        $fct=$programados->resultado($idCategoria);
        $Clie = new ClienteModel();
        $Cl=$Clie->Listar();
        //instancia de caja
        $Caja = new CajaModel();

        $datos=$Caja->kardexnada($_POST['report']);
        $maximo = $Caja->maximo();?>
        <?php foreach ($maximo as $key): ?>
            <?php //el  nuevo valor  aumenta mucho
              $amigo =$key->reporte;
              $maximus =$key->reporte; ?>
        <?php endforeach; ?><?php
        $datoscaja=$Caja->kardexCaja($amigo);
        $datoscajas=$Caja->kardexCajas($amigo);
        $Cat = new CategoriaModel();
        $Consulta=["id_categoria" => $idCategoria];
        $Cate=$Cat->ObtenerbyId($Consulta);
        $mensaje = session('mensaje');
        $data =[
            "datos" => $Cl,
            "caja" => $datos,
            "Catego" => $Cate,
            "Programas" => $fct,
            "temp_caja" =>$tmp_caja,
            "idcat"=>$idCategoria,
            "dtcaja"=>$datoscaja,
            "dtscaja"=>$datoscajas,
            "maximo"=>$maximo,
            "maximus"=>$maximus,
            "mensaje" => $mensaje
        ];

        return view('Caja/Reporte',$data);
    }
    public function nuevo() {

        $caja = new CajaModel();
        $valor = $_POST['reporte']-1;
        echo $valor;
        $nuevacaja= $caja->NuevoKardex($valor);?>
        <?php foreach ($nuevacaja as $key) : ?>
        <?php $soles=$key->Soles?>
        <?php $dolares=$key->Dolares?>
        <?php endforeach; ?>
        <?php
        
        $datos =[
            "id_cliente"     => 1,
            "id_categoria"     => 1,
            "id_subcategoria"     => 0,
            "comprobante"     => "",
            "numero"     => "",
            "fecha"     => date('Y/m/d'),
            "importes"     => $soles,
            "imported"     => $dolares,
            "metodo"     => "Saldo",
            "descripcion"     => "Saldo Anterior",
            "reporte"     => $_POST['reporte'],
        ];
        $caja->insertar($datos);
        return redirect()->to(base_url().'/kardex/');

    }
    public function act($id,$valor){
        $datos =[
            "reporte"     => $valor,
        ];
        $cja = new CajaModel();
        $cja->actualizar($datos,$id);

        return redirect()->to(base_url().'/kardex/');
    }

    public function kardex()
    {
        
        $idCategoria=1;
        $temp =new TempCajaModel();
        $tmp_caja = $temp->resultado($idCategoria);
        $programados = new ProgramadosModel();
        $fct=$programados->resultado($idCategoria);
        $Clie = new ClienteModel();
        $Cl=$Clie->Listar();
        //instancia de caja
        $Caja = new CajaModel();
        $datos=$Caja->kardex();
        $maximo = $Caja->maximo();?>
        <?php foreach ($maximo as $key): ?>
            <?php //el  nuevo valor  aumenta mucho
              $amigo =$key->reporte;
              $maximus =$key->reporte; ?>
        <?php endforeach; ?><?php
        $datoscaja=$Caja->kardexCaja($amigo);
        $datoscajas=$Caja->kardexCajas($amigo);
        $Cat = new CategoriaModel();
        $Consulta=["id_categoria" => $idCategoria];
        $Cate=$Cat->ObtenerbyId($Consulta);
        $mensaje = session('mensaje');
        $data =[
            "datos" => $Cl,
            "caja" => $datos,
            "Catego" => $Cate,
            "Programas" => $fct,
            "temp_caja" =>$tmp_caja,
            "idcat"=>$idCategoria,
            "dtcaja"=>$datoscaja,
            "dtscaja"=>$datoscajas,
            "maximo"=>$maximo,
            "maximus"=>$maximus,
            "mensaje" => $mensaje
        ];

        return view('Caja/kardex',$data);
    }
    public function procesar($idpro){
        $pro = new ProgramadosModel();
        $Consulta=["id_programado" => $idpro];
        $datPro = $pro->ObtenerbyId($Consulta);
        $datos =[
            "id_programado"     => $datPro[0]['id_programado'],
            "id_cliente"     => $datPro[0]['id_cliente'],
            "id_categoria"     => $datPro[0]['id_categoria'],
            "id_subcategoria"     => $datPro[0]['id_subcategoria'],
            "movimiento"     => "movido",
            "montos"     => $datPro[0]['montos'],
            "montod"     => $datPro[0]['montod'],
            "descripcion"     => $datPro[0]['descripcion'],
        
        ];
        //$id = $_POST['idFuncion'];

		$Funcion = new ProgramadosModel();

		$respuesta = $Funcion->actualizar($datos, $idpro);
        $Caja_tmp = new TempCajaModel();
        $respuesta= $Caja_tmp->insertar($datos);

        if($respuesta>0){
            return redirect()->to(base_url().'/Caja/'.$datPro[0]['id_cliente']);

        }else{
            return redirect()->to(base_url().'/Caja/'.$datPro[0]['id_cliente']);

        }

    }
    public function insertar(){
        //$proM = $_POST['progrmaciones'];
       
        $datos =[
            "id_cliente"     => $_POST['Id_Cliente'],
            "id_categoria"     => $_POST['Id_Categoria'],
            "id_subcategoria"     => $_POST['id_subcategoria'],
            "comprobante"     => "",
            "numero"     => "",
            "fecha"     => date('Y/m/d'),
            "importes"     => $_POST['importes'],
            "imported"     => $_POST['imported'],
            "metodo"     => "Efectivo",
            "descripcion"     => $_POST['Descripcion'],
        ];
        $Caja = new CajaModel();
        $respuesta= $Caja->insertar($datos);
      
        if(isset($_POST['progrmaciones'])){
        $compete = new CategoriaModel();
        $valores = $compete->consultadevalor($_POST['Id_Categoria']);?>
        <?php foreach ($valores as $key): ?>
            <?php $con_id = $key->id_categoria ?>
        <?php endforeach; ?>  
        <?php
        $dbdatos =[
            "id_cliente"     => $_POST['Id_Cliente'],
            "id_categoria"     => $con_id,
            /*"movimiento"     => $_POST['Movimiento'],*/
            "montos"     => $_POST['importes'],
            "montod"     => $_POST['imported'],
            "descripcion"     => $_POST['Descripcion'],
        ];
        $FC = new ProgramadosModel();
        $nada= $FC->insertar($dbdatos);}
        if($respuesta>0){
            return redirect()->to(base_url().'/Cajas/'.$_POST['Id_Categoria']);

        }else{
            return redirect()->to(base_url().'/Cajas/'.$_POST['Id_Categoria']);

        }
        
    }
    public function buscar(){

        return redirect()->to(base_url().'/Caja/'.$_POST['Id_Clientes']);
        
    }
    public function imp($id){
        $mdcaja = new CajaModel();
        $data = ["id_caja" => $id];
        $caja = $mdcaja->ObtenerbyId($data);
        $mdcliente = new ClienteModel();
        $data = ["id_cliente" => $caja[0]['id_cliente']];
        $cliente = $mdcliente->ObtenerbyId($data);

        $nada = [   "valores" => $caja,
                    "cliente" => $cliente         
    ];
        return view('Caja/impresion',$nada);
    }
    public function insertartmp(){
        // iniciando  variables
        $dolar=0;
        $soles=0;
        $dolar=$_POST['Montod'];
        $soles=$_POST['Montos'];

        $dolart=0;
        $solest=0;
        $dolart=$_POST['montodolares'];
        $solest=$_POST['montosoles'];
        $det = new DetalleModel(); 
        $temp = new TempCajaModel();
        //consulta maximo temporal
        $transaccion = $temp->max($_POST['id_cliente']);?>
        <?php foreach ($transaccion as $key): ?>
            <?php
            //guardar  maximo  temporal
                $id_transaccion=$key->id_transaccion;
            ?>
            <?php endforeach; ?><?php
            //arreglo  de datos para Caja   
        $datos =[
            "id_cliente"     => $_POST['id_cliente'],
            "id_categoria"     => $_POST['id_categoria'],
            "comprobante"     =>"" ,
            "numero"     => "",
            "fecha"     =>  date('Y/m/d'),
            "importes"     => $_POST['Montos'],
            "imported"     => $_POST['Montod'],
            "metodo"     => "efectivo",
            "descripcion"     => $_POST['Descripcion'],
        ];
        //consultar  si  montos son  mayores que  cero//
        if(($_POST['Montos'])>0 or ($_POST['Montod'])>0 ){
            $Caja = new CajaModel();
            //guardar datos en caja
            $respuesta= $Caja->insertar($datos);
            //obterner valor de Caja guardado
            $valor = $Caja->max();?>
            <?php foreach ($valor as $key): ?>
                <?php
                //valor obtenido de caja
                $idcaja=$key->id_caja;
                ?>
                <?php endforeach; ?><?php
                //generar arreglo para detalle
                // no se guarda dettale pprogrmado por que espago nuevo
            $datosdeta =[
                /*"id_programado"     => $key->id_programado,*/
                "id_caja"     => $idcaja,
                "id_cliente"     => $_POST['id_cliente'],
                "id_pronuevo"     => $id_transaccion ,
                "detalle"     => "pago nuevo",
        
            ];
            //guardar detalle
            $respuesta=$det->insertar($datosdeta);
            
        }
        
        // para  recuperar datos de temporal  por cliente
        $clte=$_POST['id_cliente'];
        // reccorrer datos obtenidos de temporal
        $datPro = $temp->resultado($clte);?>
        
        <?php foreach ($datPro as $key): ?><?php
        // generar arreglo para programados
        $datosa =[
         "movimiento"     => "Pagado",
        ];
        //generar arreglo para detalle
        //obtiene el  valor de id progrmado 
        $datosdet =[
        "id_programado"     => $key->id_programado,
        /*"id_caja"     => $key->id_caja,*/
        "id_cliente"     => $key->id_cliente,
        "id_pronuevo"     => $id_transaccion ,
        "detalle"     => "detalle  de transaccion",

    ];
        // guardar  detalle
        $respuesta=$det->insertar($datosdet);
        //se  abre progrmados model
        $pro = new ProgramadosModel();
        //actualizar dato segun  id progrmado
        $respuesta = $pro->actualizar($datosa, $key->id_programado);
        $data = ["id_caja" => $key->id_caja];
        //una  vez  actualizado eliminar de temporal
        $respuesta = $temp->eliminar($data);
        ?><?php endforeach; ?><?php
        //hasta  aqui  actualiza progmrados y  elimina  temporal

        //crear nuevo programado  si  es  necesario
        //Consulta si monto dolares son  diferentes 
        if(floatval($dolar)<>floatval($_POST['montodolares'])) {
            // consulta si monto dolares recibido es mayor a cero 
            if(floatval($_POST['montodolares'])>0){
                //por cobrar dolares
                $intdatos =[
                    "id_cliente"     => $_POST['id_cliente'],
                    "id_categoria"     => $_POST['id_categoria'],
                    "id_subcategoria"     => $_POST['id_subcategoria'],
                    /*"movimiento"     => $_POST['Movimiento'],*/
                    "montos"     => $_POST['Montos'],
                    "montod"     => floatval($dolart)-floatval($dolar),
                    "descripcion"     => "por cobrar dolares",
                  ];
                  $respuesta= $pro->insertar($intdatos);

            }else{
                  //por pagar dolares
                $intdatos =[
                    "id_cliente"     => $_POST['id_cliente'],
                    "id_categoria"     => $_POST['id_categoria'],
                    "id_subcategoria"     => $_POST['id_subcategoria'],
                     /*"movimiento"     => $_POST['Movimiento'],*/
                    "montos"     => $_POST['Montos'],
                    "montod"     => -floatval($dolart)-floatval($dolar),
                    "descripcion"     => "por pagar dolares",

                ];
                $respuesta= $pro->insertar($intdatos);

            }
        }
        if(floatval($soles)<>floatval($_POST['montosoles'])){
            if(floatval($_POST['montosoles'])>0){
                  //por cobrar soles
                $intdatos =[
                    "id_cliente"     => $_POST['id_cliente'],
                    "id_categoria"     => $_POST['id_categoria'],
                    "id_subcategoria"     => $_POST['id_subcategoria'],
                    /*"movimiento"     => $_POST['Movimiento'],*/
                    "montos"     => floatval($solest)-floatval($soles),
                    "montod"     => $_POST['Montod'],
                    "descripcion"     => "por cobrar soles",
                ];
                $respuesta= $pro->insertar($intdatos);


            }else{
                  //por pagar soles
                $intdatos =[
                    "id_cliente"     => $_POST['id_cliente'],
                    "id_categoria"     => $_POST['id_categoria'],
                    "id_subcategoria"     => $_POST['id_subcategoria'],
                    /*"movimiento"     => $_POST['Movimiento'],*/
                    "montos"     => -floatval($solest)-floatval($soles),
                    "montod"     => $_POST['Montod'],
                    "descripcion"     => "por pagar soles",

                ];
                $respuesta= $pro->insertar($intdatos);


            }
       }
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Caja/'.$_POST['id_cliente']);

        }else{
            return redirect()->to(base_url().'/Caja/'.$_POST['id_cliente']);

        }
    
        
    }
    function convertToPdf(){
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('factura'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    } 
    public function subcategoria(){
        $SubCat = new SubCategoriaModel();
        $SubCate=$SubCat->ListarbyCat($_POST['id_categoria']);?>
        <?php foreach ($SubCate as $key): ?>
            <option value="<?php echo $key->id_subcategoria ?>"><?php echo $key->nombre ?></option>
        <?php endforeach; ?> <?php 


    }
    public function obtener($id){
        
        $Cat = new CategoriaModel();
        
        $Cate=$Cat->listar();
        
        $mdcaja = new CajaModel();
        $data = ["id_caja" => $id];
        $caja = $mdcaja->ObtenerbyId($data);
        $mdcliente = new ClienteModel();
        $data = ["id_cliente" => $caja[0]['id_cliente']];
        $cliente = $mdcliente->ObtenerbyId($data);
        $mensaje = session('mensaje');

        $nada = [   "valores" => $caja,
                    "cliente" => $cliente,
                    "Catego" => $Cate,
                    "mensaje"  => $mensaje,       
    ];
        return view('Caja/actualizar',$nada);

    }
    public function actualizar(){
        $mdcaja = new CajaModel();
        $nada = [    //"id_cliente"     => $_POST['id_cliente'],
        "id_categoria"     => $_POST['id_categoria'],
        "id_subcategoria"     => $_POST['id_subcategoria'],
        /*"movimiento"     => $_POST['Movimiento'],*/
        //"montos"     => floatval($solest)-floatval($soles),
        //"montod"     => $_POST['Montod'],
        //"descripcion"     => "por cobrar soles",
    ];
    $rpta = $mdcaja->actualizar($nada, $_POST['id_caja']);
    return redirect()->to(base_url());
       

    }

    public function eliminar($id_temp){
        
        $titulo = new TempCajaModel();
        $data = ["id_caja" => $id_temp];
        $datatemp = $titulo->ObtenerbyId($data);
		
        
        $datos =[
        
            
            "movimiento"     => "",
            
        
        ];
        $pro = new ProgramadosModel();
        $respuesta = $pro->actualizar($datos, $datatemp[0]['id_programado']);
		$respuesta = $titulo->eliminar($data);

		if ($respuesta>0) {
            return redirect()->to(base_url().'/Caja/'.$datatemp[0]['id_cliente'])->with('mensaje', '1');
		} else {
            return redirect()->to(base_url().'/Caja/'.$datatemp[0]['id_cliente'])->with('mensaje', '0');
		}
    }
}