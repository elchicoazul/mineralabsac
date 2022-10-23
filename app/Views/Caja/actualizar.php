<?php /*
$id_cl=$datos[0]['id_cliente'];
$ingresos=0;
$ingresod=0;
$egresos=0;
$egresosd=0;
$textoingresos="";
$textoegresos="";
$nombre= $datos[0]['nombre']." ".$datos[0]['dni'];?>
<?php foreach ($temp_caja as $key): ?>
<?php

    if($key->tipo=="Ingreso"){
        $ingresos=$ingresos+$key->montos;
        $ingresod=$ingresod+$key->montod;
        $textoingresos=$textoingresos.$key->descripcion;

    }else{
        $egresos=$egresos+$key->montos;
        $egresosd=$egresosd+$key->montod;
        $textoegresos=$textoegresos.$key->descripcion;
    }
?>

<?php endforeach; ?>
<?php 
$montots= $ingresos-$egresos;

$montotd= $ingresod-$egresosd;


if($montotd>=0){

}else{

}*/
$soles = $valores[0]['importes'];
$dolares = $valores[0]['imported'];
$descripcion = $valores[0]['descripcion'];
$id_caja = $valores[0]['id_caja'];
$nombre = $cliente[0]['nombre'];
?>

<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?php // echo $nombre;?></h1>
                            </div>
                            
                            <hr>
                            <h1><?php echo $nombre ?></h1>
                            
                            
                            <hr>
                            <form class="user" action="<?php echo base_url().'/caja/actualizar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="hidden" class="form-control form-control-user" value="<?php // echo $id_cl?>"     id="id_cliente" name="id_cliente" placeholder="id_cliente">
                                        <input type="hidden" class="form-control form-control-user"   value="<?php // echo $montots?>"   id="montosoles" name="montosoles" placeholder="montosoles">
                                        <input type="hidden" class="form-control form-control-user"   value="<?php // echo $montotd?>"   id="montodolares" name="montodolares" placeholder="montodolares">
                                        <input type="hidden" class="form-control form-control-user"   value="<?php  echo $id_caja?>"   id="id_caja" name="id_caja" placeholder="id_caja">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <input disabled type="text" class="form-control form-control-user" id="Montos" name="Montos" value="<?php echo $soles ?>" placeholder="Montos">
                                    </div>
                                    <div class="col-sm-3">
                                        <input disabled type="text" class="form-control form-control-user" id="Montod" name="Montod" value="<?php echo $dolares?>" placeholder="Montod">
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" id="id_categoria" name="id_categoria">
                                            <?php  foreach ($Catego as $key): ?>
                                            <option value=<?php  echo  $key->id_categoria?>><?php  echo  $key->nombre?>-<?php  echo  $key->tipo?></option>
                                            <?php  endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                    <select required class="form-control" id="id_subcategoria" name="id_subcategoria">
                                            
                                            <option value=""></option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <textarea disabled class="form-control" name="Descripcion" id="Descripcion" > <?php  echo $descripcion?></textarea>
                                    </div>
                                    
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Actualizar</button>
                                </div>
                                
                               
                            </form>
                        </div>
                    </div>
                                             
                </div>
            </div>
</div>
<script>
    $(document).ready(function(){
                $("#id_categoria").change(function () {
                    $("#id_categoria option:selected").each(function () {
                        id_categoria = $('#id_categoria').val();
                        $.post("<?php echo base_url() ?>/CajaController/subcategoria", {
                            id_categoria: id_categoria
                        }, function (data) {
                            $("#id_subcategoria").html(data);
                            console.log(data);
                        });
                    });
                });
            });
</script>   
