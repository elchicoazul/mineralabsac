<?php
$id_cliente = $rpta[0]['id_cliente'];
$nombre = $rpta[0]['nombre'];
$rol = $rpta[0]['rol'];
$id_tipocliente = $rpta[0]['id_tipocliente'];
$dni = $rpta[0]['dni'];
$direccion = $rpta[0]['direccion'];
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
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Usuario</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Cliente/actualizar/'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select class="form-control" id="TipoCliente" name="TipoCliente">
                                            <?php foreach ($Tipo as $key): ?>
                                            <option value=<?php echo  $key->id_tipocliente?>><?php echo  $key->nombre?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="DNI" name="DNI" placeholder="DNI">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Direccion" name="Direccion" placeholder="Direccion">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select class="form-control" id="Rol" name="Rol">
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Dashboard">Administrador</option>
                                            <option value="Planta">Planeamiento</option>
                                            <option value="Trabajador">Trabajador</option>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="Descripcion" name="Descripcion" placeholder="contraseña">
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