<?php $nombre=$Catego[0]['nombre'];?>
<?php $tipo=$Catego[0]['tipo'];?>
<?php $sumasol=0;
      $sumadol =0;
      $sumasolK=0;
      $sumadolk =0;
      ?>
<?php foreach ($maximo as $key): ?>
    <?php //el  nuevo valor  aumenta mucho
      $amigo =$key->reporte; ?>
<?php endforeach; ?>

<?php foreach (session('Cliente')as $key): ?>
<?php $dash=$key->rol;?>
<?php endforeach; ?>
<?= $this->extend('Layout/'.$dash)?>
<?= $this->section('contenido')?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form method="Post" action="<?php echo base_url() . '/kardex/nuevo' ?>">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">kardex</h1>
                                <input  type="number" name="reporte" id="reporte" value="<?php echo $amigo+1; ?>">
                                <button type="submit" class="btn btn-info">Nuevo</button>
                            </div>
                            </form>
                            <table class="table table-sm table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Salida Soles</th>
                                    <th scope="col">entrada Soles</th>
                                    <th scope="col">Total Soles</th>
                                    <th scope="col">Salida Dolares</th>
                                    <th scope="col">entrada Dolares</th>
                                    <th scope="col">Total Dolares</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($caja as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_caja?></th>
                                    
                                    <td><?php echo  $key->fecha?></td>
                                    <td><?php echo  $key->Catego?></td>
                                    <td><?php echo  $key->nombrecliente?></td>
                                    <?php if($key->tipo=="Egreso"){?>
                                        <td><?php echo  $key->importes?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $sumasol=$sumasol-$key->importes?></td>
                                        <td><?php echo  $key->imported?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $sumadol=$sumadol-$key->imported?></td>

                                    <?php
                                    }else{?>
                                        <td>0.00</td>
                                        <td><?php echo  $key->importes?></td>
                                        <td><?php echo  $sumasol=$sumasol+$key->importes?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $key->imported?></td>
                                        <td><?php echo  $sumadol=$sumadol+$key->imported?></td>

                                    <?php } ?>
                                    
                                    
                                    <td><?php echo substr($key->descr,0,10)?></td>
                                
                                    <td><a href="<?php echo base_url() . '/kardex/'.$key->id_caja.'/'.$amigo ?>" class="btn btn-success btn-sm"><i class="material-icons">library_add</i></a></td>
                                    
                                    </tr>
                                <?php endforeach; ?>
                                    
                                </tbody>
                            </table>

                            <table class="table table-sm table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Salida Soles</th>
                                    <th scope="col">entrada Soles</th>
                                    <th scope="col">Total Soles</th>
                                    <th scope="col">Salida Dolares</th>
                                    <th scope="col">entrada Dolares</th>
                                    <th scope="col">Total Dolares</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $sumasol=0; $sumadol=0; foreach ($dtscaja as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_caja?></th>
                                    
                                    <td><?php echo  $key->fecha?></td>
                                    <td><?php echo  $key->Catego?></td>
                                    <td><?php echo  $key->nombrecliente?></td>
                                    <?php if($key->tipo=="Egreso"){?>
                                        <td><?php echo  $key->importes?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $sumasol=$sumasol-$key->importes?></td>
                                        <td><?php echo  $key->imported?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $sumadol=$sumadol-$key->imported?></td>

                                    <?php
                                    }else{?>
                                        <td>0.00</td>
                                        <td><?php echo  $key->importes?></td>
                                        <td><?php echo  $sumasol=$sumasol+$key->importes?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $key->imported?></td>
                                        <td><?php echo  $sumadol=$sumadol+$key->imported?></td>

                                    <?php } ?>
                                    
                                    
                                    <td><?php echo substr($key->descr,0,10)?></td>
                                
                                    <td><a href="<?php //echo base_url() . '/kardex/'.$key->id_caja.'/0' ?>" class="btn btn-danger btn-sm"><i class="material-icons">block</i></a></td>

                                <?php endforeach; ?>

                                <?php  foreach ($dtcaja as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_caja?></th>
                                    
                                    <td><?php echo  $key->fecha?></td>
                                    <td><?php echo  $key->Catego?></td>
                                    <td><?php echo  $key->nombrecliente?></td>
                                    <?php if($key->tipo=="Egreso"){?>
                                        <td><?php echo  $key->importes?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $sumasol=$sumasol-$key->importes?></td>
                                        <td><?php echo  $key->imported?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $sumadol=$sumadol-$key->imported?></td>

                                    <?php
                                    }else{?>
                                        <td>0.00</td>
                                        <td><?php echo  $key->importes?></td>
                                        <td><?php echo  $sumasol=$sumasol+$key->importes?></td>
                                        <td>0.00</td>
                                        <td><?php echo  $key->imported?></td>
                                        <td><?php echo  $sumadol=$sumadol+$key->imported?></td>

                                    <?php } ?>
                                    
                                    
                                    <td><?php echo substr($key->descr,0,10)?></td>
                                
                                    <td><a href="<?php echo base_url() . '/kardex/'.$key->id_caja.'/0' ?>" class="btn btn-danger btn-sm"><i class="material-icons">remove</i></a></td>

                                <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
        
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