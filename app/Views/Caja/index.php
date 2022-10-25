<?php
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

}
?>
<?= $this->extend('Layout/Dashboard')?>
<?= $this->section('contenido')?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?php echo $nombre;?></h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Caja/insertar'?>" method="post">
                                
                                <div class="form-group row">
                                    <div class="col-sm-6" >
                                        <center>Por Cobrar</center>
                                        <table class="table table-striped table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">montos</th>
                                                <th scope="col">montod</th>
                                                <th scope="col">descripcion</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($Programas as $key): ?>
                                                <?php if ( $key->tipo=="Ingreso" && $key->movimiento=="") {?>
                                                <tr>
                                                <th scope="row"><?php echo  $key->id_programado?></th>
                                                <td><?php echo  $key->montos?></td>
                                                <td><?php echo  $key->montod?></td>
                                                <td><?php echo $key->descripcion?></td>
                                                <td><a href="<?php echo base_url().'/procesar/'.$key->id_programado?>" class="btn btn-success btn-sm">Añadir</a></td>
                                                
                                                </tr>
                                                <?php }?>
                                            <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0" >
                                        <center>Por Pagar</center>
                                        <table class="table table-striped table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">montos</th>
                                                <th scope="col">montod</th>
                                                <th scope="col">descripcion</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($Programas as $key): ?>
                                                <?php if ( $key->tipo=="Egreso" && $key->movimiento=="") {?>
                                                <tr>
                                                
                                                <th scope="row"><?php echo  $key->id_programado?></th>
                                                <td><?php echo  $key->montos?></td>
                                                <td><?php echo  $key->montod?></td>
                                                <td><?php echo $key->descripcion?></td>
                                                <td><a href="<?php echo base_url().'/procesar/'.$key->id_programado?>" class="btn btn-success btn-sm">Añadir</a></td>
                                                </tr>
                                                <?php }?>
                                            <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                
                                
                                
                               
                            </form>
                            <hr>
                            <center>vista previa</center>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                <?php if($montots>=0){?>
                                        <h4> <?php echo "Cobrar :".$montots?>
                                        Soles</h4>
                                       <?php  }else{?>
                                        <h4> <?php echo "Pagar :".-$montots?>
                                        Soles</h4>
                                       <?php 

                                        }?>
                                    
                                </div>
                                <div class="col-sm-6">
                                <?php if($montots>=0){?>
                                        <h4> <?php echo "Cobrar :".$montotd?>
                                        Dolares</h4>
                                       <?php  }else{?>
                                        <h4> <?php echo "Pagar :".-$montotd?>
                                        Dolares</h4>
                                       <?php 

                                        }?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <table class="table table-striped table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">montos</th>
                                                <th scope="col">montod</th>
                                                <th scope="col">descripcion</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($temp_caja as $key): ?>
                                                <tr>
                                                <th scope="row"><?php echo  $key->id_programado?></th>
                                                <td><?php echo  $key->montos?></td>
                                                <td><?php echo  $key->montod?></td>
                                                <td><?php echo $key->descripcion?></td>
                                                <td><a href="<?php echo base_url().'/proceso/eliminar/'.$key->id_caja?>" class="btn btn-danger btn-sm">Quitar</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            <hr>
                            <form class="user" action="<?php echo base_url().'/pro/insertar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="hidden" class="form-control form-control-user" value="<?php echo $id_cl?>"     id="id_cliente" name="id_cliente" placeholder="id_cliente">
                                        <input type="hidden" class="form-control form-control-user"   value="<?php echo $montots?>"   id="montosoles" name="montosoles" placeholder="montosoles">
                                        <input type="hidden" class="form-control form-control-user"   value="<?php echo $montotd?>"   id="montodolares" name="montodolares" placeholder="montodolares">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Montos" name="Montos" placeholder="Montos">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-user" id="Montod" name="Montod" placeholder="Montod">
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" id="id_categoria" name="id_categoria">
                                            <?php foreach ($Catego as $key): ?>
                                            <option value=<?php echo  $key->id_categoria?>><?php echo  $key->nombre?>-<?php echo  $key->tipo?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" id="id_subcategoria" name="id_subcategoria">
                                            
                                            <option value=""></option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <textarea class="form-control" name="Descripcion" id="Descripcion" >Como  resultado: <?php echo $textoingresos."-".$textoegresos?></textarea>
                                    </div>
                                    
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Pagar</button>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
let mensaje = '<?php echo $mensaje ?>';

if (mensaje == '1') {
    swal(':D', 'Creado con éxito', 'success');
} else if (mensaje == '0') {
    swal(':(', 'Fallo al agregar!', 'error');
} else if (mensaje == '2') {
    swal(':D', 'Actualizado con exito', 'success');
} else if (mensaje == '3') {
    swal(':(', 'Fallo al Actualizar!', 'error');
} else if (mensaje == '4') {
    swal(':D', 'Eliminado con exito!', 'success');
} else if (mensaje == '5') {
    swal(':(', 'Fallo al eliminar!', 'error');
}
</script>  
<?= $this->endSection()?>