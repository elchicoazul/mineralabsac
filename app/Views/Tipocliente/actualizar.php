<?php
$id_tipocliente = $datos[0]['id_tipocliente'];
$nombre = $datos[0]['nombre'];
$descripcion = $datos[0]['descripcion'];
?>
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
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Tipo Usuario</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Tipocliente/actualizar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input hidden type="text" class="form-control form-control-user" id="id_tipocliente" name="id_tipocliente" value="<?php echo $id_tipocliente?>">
                                        <input type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre" value="<?php echo $nombre?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="Descripcion" name="Descripcion" placeholder="Descripcion" value="<?php echo $descripcion?>">
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
        
<?= $this->endSection()?>