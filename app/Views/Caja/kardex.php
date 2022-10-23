<?php $nombre=$Catego[0]['nombre'];?>
<?php $tipo=$Catego[0]['tipo'];?>
<?php $sumasol=0;
      $sumadol =0;?>

<?= $this->extend('Layout/Dashboard')?>
<?= $this->section('contenido')?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">kardex</h1>
                            </div>
                            
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
                                
                                    <td><a href="<?php // echo base_url().'/Cliente/editar/'.$key->id_caja?>" class="btn btn-info btn-sm">detalles</a></td>
                                    
                                    </tr>
                                <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
        
<?= $this->endSection()?>