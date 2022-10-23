<?= $this->extend('Layout/Dashboard')?>
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
                            <form class="user" action="<?php echo base_url().'/Tipocliente/insertar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="Descripcion" name="Descripcion" placeholder="Descripcion">
                                    </div>
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Ingresar</button>
                                </div>
                                
                               
                            </form>
                            <hr>
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($datos as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_tipocliente?></th>
                                    <td><?php echo  $key->nombre?></td>
                                    <td><?php echo $key->descripcion?></td>
                                
                                    <td><a href="<?php echo base_url().'/AgrupMenu/editar/'.$key->id_tipocliente?>" class="btn btn-info btn-sm">editar</a></td>
                                    <td><a href="<?php echo base_url().'/eliminar'?>" class="btn btn-danger btn-sm">eliminar</a></td>
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