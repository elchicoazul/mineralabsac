<?php
$idcategoria = $Catego[0]['id_categoria']; 
 $Nombrecategoria = $Catego[0]['nombre'];
 $Tipodemovimiento = $Catego[0]['tipo'];
 
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
                                <h1 class="h4 text-gray-900 mb-4">Programar <?php echo " ". $Tipodemovimiento." "?> de Dinero</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Programados/insertar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        
                                            <label for=""><?php echo $Tipodemovimiento?> </label>
                                            <input hidden type="text" id="Categoria" name="Categoria" value="<?php echo $idcat ?>">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="Text">Cliente</label>
                                        <input required type="Text"  name="Cliente" id="Cliente" class="form-control">
                                        <input required hidden type="Text" name="Id_Cliente" id="Id_Cliente" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                    <label for="">Sub Categoria</label>
                                        <select class="form-control" id="id_subcategoria" name="id_subcategoria">
                                            <?php foreach ($subcaja as $key): ?>
                                                <option value="<?php echo $key->id_subcategoria ?>"><?php echo $key->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="Descripcion" id="Descripcion" ></textarea>
                                    </div>
                                    
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="Montos" name="Montos" placeholder="Monto soles">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Montod" name="Montod" placeholder="Monto dolares">
                                    </div>
                                    
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Programar</button>
                                </div>
                                
                               
                            </form>
                            <hr>
                            <table hidden class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">id_cli</th>
                                    <th scope="col">id_cat</th>
                                    <th scope="col">movimiento</th>
                                    <th scope="col">montos</th>
                                    <th scope="col">montod</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($Programas as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_programado?></th>
                                    <td><?php echo  $key->id_categoria?></td>
                                    <td><?php echo  $key->id_cliente?></td>
                                    <td><?php echo  $key->movimiento?></td>
                                    <td><?php echo  $key->montos?></td>
                                    <td><?php echo  $key->montod?></td>
                                    <td><?php echo $key->descripcion?></td>
                                
                                    <td><a href="<?php echo base_url().'/Programados/editar/'.$key->id_programado?>" class="btn btn-info btn-sm">Pagar</a></td>
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
<script type="text/javascript">

	var Valores = {
		//url: "<?php echo base_url();?>js/countries.json",
		url: '<?php echo base_url('ClienteController/getClientes');?>',
		
		getValue: "nombre",
		
		theme:"blue-light",

		// template: {
		// 	type: "description",
		// 	fields: {
		// 		description: "cantHabit"
		// 	}
		// },

		// template: {
		// 	type: "custom",
		// 	method: function(value, item) {
		// 		return item.ciudad + " || " + item.cantHabit + " || " + item.idCiudad;
		// 	}
		// },

		template: {
		    type: "description",
		    fields: {
			    description: "dni"
		    }
	    },

		list: {
			maxNumberOfElements: 5,
			match: {
				enabled: true
			},
			// onClickEvent: function(value, item) {
			// 	alert('seleccionado');
			// },
            

            
			onClickEvent: function() {
				var value = $("#Cliente").getSelectedItemData().id_cliente;
                
				$("#Id_Cliente").val(value).trigger("change");
				
                
			},
			onKeyEnterEvent: function(){
				var value = $("#Id_Cliente").getSelectedItemData().idCiudad;

				$("#Id_Cliente").val(value).trigger("change");
			}
		}
	};

	$("#Cliente").easyAutocomplete(Valores);
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