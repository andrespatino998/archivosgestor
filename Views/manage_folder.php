<?php 
include ('../Models/db_connect.php');
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM folders where id=".$_GET['id']);
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $v){
			$meta[$k] = $v;
		}
	}
}


?>


<div class="container-fluid">
	<form action="" id="manage-folder">
		<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] :'' ?>">
		<input type="hidden" name="parent_id" value="<?php echo isset($_GET['fid']) ? $_GET['fid'] :'' ?>">
		<div class="form-group">
			<label for="name" class="control-label">Nombre de la Carpeta</label>
			<input type="text"  name="name" id="name" value="<?php echo isset($meta['name']) ? $meta['name'] :'Nueva Carpeta' ?>" class="form-control">
		


			<label for="id_departamento" class="col-form-label">Departamento</label>
				<select type="text"  id="id_departamento" name="id_departamento"class="form-control">
			
			<?php  
			
			  
			include_once '../Models/conexion_bd.php';
			$obj = new BD_PDO();
			
			
			$departamentos = $obj->Ejecutar_Instruccion("SELECT * FROM departamentos");

			$carpetas = $obj->Ejecutar_Instruccion("SELECT * FROM folders where id=".$_GET['id']);
		$iddepa = $carpetas[0]['id_departamento'];	
			
			
			
			foreach ($departamentos as $renglon) { 
			echo $renglon['id'] ; ?>
			<option  value="<?php echo $renglon[0] ?>"<?php if($renglon[0]==$iddepa) { echo 'Selected';  } ?>><?php echo $renglon[1] ?></option>
		
			<?php  }?> 
		
           </select>

		</div>
		<div class="form-group" id="msg"></div>
	</form>
</div>

<script>
	$(document).ready(function(){
		$('#manage-folder').submit(function(e){
			e.preventDefault()
			start_load();
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_folder',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(typeof resp != undefined){
					resp = JSON.parse(resp);
						
					if(resp.status == 1){
						toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "1500",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
                    }
						toastr.success("Carpeta agregada correctamente.","Exito!")
						setTimeout(function(){
							location.reload()
						},1500)
					}else{
						$('#msg').html('<div class="alert alert-danger">'+"El nombre de la carpeta ya existe"+'</div>')
						end_load()
					}
				}
			}
		})
		})
	})
</script>
