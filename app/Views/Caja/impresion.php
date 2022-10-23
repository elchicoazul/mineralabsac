<?php
$idboleta = $valores[0]['id_caja'];
$fecha = $valores[0]['fecha'];
$concepto = $valores[0]['descripcion'];
$metodo = $valores[0]['metodo'];
if($valores[0]['importes']>$valores[0]['imported']){
    $monto = $valores[0]['importes'];
    $moneda = "Soles";
    }
    else{
        $monto = $valores[0]['imported'];
        $moneda = "Dolares";
    }

$nombrecliente = $cliente[0]['nombre'];

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div class="conte">
    <div class="fila">
        <h1>Recibo</h1>
    </div>
    <div class="fila">
        <div class="parte-sm-4">
            <div class="fila"><h2>Fecha</h2></div>
            <div class="fila"><h3><?php echo $fecha ?></h3></div>
        </div>
        <div class="parte-sm-4">
            <div class="fila"><h2>Movimiento</h2></div>
            <div class="fila"><h3>Ingreso</h3></div>

        </div>
        <div class="parte-sm-4">
            <div class="fila"><h2>Moneda</h2></div>
            <div class="fila"><h3><?php echo $moneda ?></h3></div>

        </div>
    </div>
   
    <div class="fila">
        <h4>Nº <?php echo $idboleta ?></h4>
    </div>
    <hr>
    
    <div class="fila">
        <div class="col-sm-4">
        <b>Recibí de:&nbsp</b>
        </div>
        <div class="col-sm-8">
        <?php echo $nombrecliente ?>
        </div>
     </div>
     <div class="fila">
        <div class="col-sm-4">
        <b>La Cantidad de:&nbsp</b>
        </div>
        <div class="col-sm-8">
        <?php echo $monto ?>
        </div>
     </div>
     <div class="fila">
        <div class="col-sm-4">
        <b>Por concepto de:&nbsp</b>
        </div>
        <div class="col-sm-8">
            <?php echo $concepto ?>
        </div>
     </div>
     <hr>
    
    <div class="fila">
        <div class="col-sm-6">
            <b><?php echo $metodo ?></b>
        </div>
        <div class="col-sm-6">
            Firma
        </div>
    </div>
</div>
<style>
    .cuerpo{
        border-color: black;
        border-width: 2px;
        border-style: solid;
    }
    .conte{
        margin: auto;
        margin-top: 5px;
        flex: 0 0 auto;
        width: 60%;/*
        border-color: red;
        border-width: 2px;
        border-style: solid;*/
    }
    .fila {
        
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-.5 * var(--bs-gutter-x));
    margin-left: calc(-.5 * var(--bs-gutter-x));
    }
    .parte-sm-6{
        flex: 0 0 auto;
        width: 66.5%;
    }
    .parte-sm-6{
        flex: 0 0 auto;
        width: 50%;
    }
    .parte-sm-4{
        flex: 0 0 auto;
        width: 33.3%;
    }
    .parte-sm-3{
        flex: 0 0 auto;
        width: 25%;
    }
    .parte-sm-2{
        flex: 0 0 auto;
        width: 16.5%;
    }
    .parte-sm-1{
        flex: 0 0 auto;
        width: 8.33%;
    }
     h1{
         margin: auto;
        font-size: 50pt;
        color: blue;
        font-family: 'Sofia', 'Arial Narrow', Arial, sans-serif;
     }

     h2{
         margin: auto;
        font-size: 15pt;
        color: #000;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     }
     h3{
         margin: auto;
        font-size: 10pt;
        color: #000;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     }
     h4{
         margin: auto;
        font-size: 30pt;
        color: red;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     }

    
</style>