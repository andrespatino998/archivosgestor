<?php 

session_start();

require '../Controllers/FotoPerfil.php';

if(!isset($_SESSION["id"]))
    header('location:../index.php');
    include ('./header.php'); 

    include '../Models/db_connect.php';
    $folder_parent = isset($_GET['fid'])? $_GET['fid'] : 0;
    
        if($_SESSION["admin"] == "1"){
            $folders = $conn->query("SELECT * FROM folders where parent_id = $folder_parent order by CAST(name AS UNSIGNED), name;");
            $files = $conn->query("SELECT * FROM files where folder_id = $folder_parent   order by CAST(name AS UNSIGNED), name;");
        }else{
            $folders = $conn->query("SELECT * FROM folders where parent_id = $folder_parent and id_departamento = '".$_SESSION['id_departamento']."' order by CAST(name AS UNSIGNED), name;");
            $files = $conn->query("SELECT * FROM files where folder_id = $folder_parent   order by CAST(name AS UNSIGNED), name;");
        }
?>
<style>
		.folder-item{
			cursor: pointer;
		}
		.folder-item:hover{
			background: #eaeaea;
		    color: black;
		    box-shadow: 3px 3px #0000000f;
		}
		.custom-menu {
	        z-index: 1000;
		    position: absolute;
		    background-color: #ffffff;
		    border: 1px solid #0000001c;
		    border-radius: 5px;
		    padding: 8px;
		    min-width: 13vw;
	}
	a.custom-menu-list {
	    width: 100%;
	    display: flex;
	    color: #4c4b4b;
	    font-weight: 600;
	    font-size: 1em;
	    padding: 1px 11px;
	}
	.file-item{
		cursor: pointer;
	}
	a.custom-menu-list:hover,.file-item:hover,.file-item.active {
	    background: #80808024;
	}
	table th,td{
		/*border-left:1px solid gray;*/
	}
	a.custom-menu-list span.icon{
			width:1em;
			margin-right: 5px
	}

</style>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestor | Carpetas</title>

    <!-- Custom fonts for this template-->
    <link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <link rel="icon" href="../Util/Img/folders.ico">

     
    <!-- Custom styles for this template-->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../Util/Css/fotoperfil3.css" rel="stylesheet">
 
    <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">
    <link href="../Util/Css/toastr.min.css" rel="stylesheet">

    <link href="../Util/Css/default/style.min.css" rel="stylesheet">

    <link href="https://docs.google.com/viewer/" rel="stylesheet">

</head>

<body id="page-top">
    
     <style>
     
     
     
     
     
     </style>




    <!-- Page Wrapper -->
<div id="wrapper">

        <!-- Sidebar -->
        <?php 

            require_once 'Layouts/sidebar.php'

            ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

            <?php 

            require_once 'Layouts/topbar.php'

            ?>
            
            <!-- Main Content -->
        <div id="content">

                <!-- Topbar -->
   

                <!-- End of Topbar -->
             
                <!-- Begin Page Content -->
                <div class="container-fluid">
             
                    <div class="col-lg-12">
                    
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">


                                <h1 class="h3 mb-0 text-gray-800" style="text-align:left;">Carpetas</h1>

                                   <?php 

                                    if($_SESSION["admin"] == "1"){

                                        echo '<div class="col-xl-10" style="text-align:right;">
                                            <button class="btn btn-primary btn-sm" id="new_folder"><i class="fa fa-plus"></i> Nueva Carpeta</button>
                                            <button class="btn btn-primary btn-sm ml-4" id="new_file"><i class="fa fa-upload"></i> Subir Archivo</button>
                                        </div>';

                                    }
   
                                    ?>

                                        


                            </div>




                        <div class="row">
                            <div class="col-lg-12">
                                 <div class="card mb-1 py-1 border-bottom-primary">
                                    <div class="card-body"  id="paths">
                                        <!-- <a href="index.php?page=files" class="">..</a>/ -->
                                        <?php 
                                        $id=$folder_parent;
                                        while($id > 0){

                                            $path = $conn->query("SELECT * FROM folders where id = $id  order by name asc")->fetch_array();
                                            echo '<script>
                                                $("#paths").prepend("<a href=\"files.php?page=files&fid='.$path['id'].'\">'.$path['name'].'</a>/")
                                            </script>';
                                            $id = $path['parent_id'];

                                        }
                                        echo '<script>
                                                $("#paths").prepend("<a href=\"files.php?page=files\">Home</a>/")
                                            </script>';
                                           
                                        ?>
                                        
                                    </div>
                                </div>   
                            </div>
                        </div>

                        <hr>
                    
                  
                    
                        <div class="row">
                            <?php 
                            while($row=$folders->fetch_assoc()):
                            ?>
                            <?php  
                            include_once '../Models/conexion_bd.php';
                            $obj = new BD_PDO();
                            $departamentos=$obj->Ejecutar_Instruccion("SELECT departamento FROM departamentos WHERE departamentos.id = '".$row['id_departamento']."'"); 
			                 ?> 
                                <div class="card col-md-3 mt-2 ml-5 mr-5 mb-2 folder-item" data-id="<?php echo $row['id'] ?>">
                                    <div class="card-body" >
                                        <h6 style="color:#0B59EB;font-weight: bold;"><?php echo $departamentos[0]["departamento"]; ?></h6>
                                            <large><span><i class="fa fa-folder fa-3x" style="color:#EBC60B;"></i></span><b class="to_folder"> <?php echo $row['name'] ?></b></large>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <hr>
                            <div class="row">
                                <div class="card col-md-12">
                                    <div class="card-body">
                                        <table width="100%">
                                            <tr>
                                                <th width="40%" class="">Nombre del Archivo</th>
                                                <th width="20%" class="">Fecha</th>
                                                <th width="40%" class="">Descripción</th>
                                            </tr>
                                            <?php 
                                        while($row=$files->fetch_assoc()):
                                            $name = explode(' ||',$row['name']);
                                            $name = isset($name[1]) ? $name[0] ." (".$name[1].").".$row['file_type'] : $name[0] .".".$row['file_type'];
                                            $img_arr = array('png','jpg','jpeg','gif','psd','tif');
                                            $doc_arr =array('doc','docx');
                                            $pdf_arr =array('pdf','ps','eps','prn');
                                            $icon ='fa-file';
                                            if(in_array(strtolower($row['file_type']),$img_arr))
                                                $icon ='fa-image';
                                            if(in_array(strtolower($row['file_type']),$doc_arr))
                                                $icon ='fa-file-word';
                                            if(in_array(strtolower($row['file_type']),$pdf_arr))
                                                $icon ='fa-file-pdf';
                                            if(in_array(strtolower($row['file_type']),['xlsx','xls','xlsm','xlsb','xltm','xlt','xla','xlr']))
                                                $icon ='fa-file-excel';
                                            if(in_array(strtolower($row['file_type']),['zip','rar','tar']))
                                                $icon ='fa-file-archive';

                                        ?>
                                            <tr class='file-item' data-id="<?php echo $row['id'] ?>" data-name="<?php echo $name ?>">
                                                <td><large><span><i class="fa <?php echo $icon ?>"></i></span><b class="to_file"> <?php echo $name ?></b></large>
                                                <input type="text" class="rename_file" value="<?php echo $row['name'] ?>" data-id="<?php echo $row['id'] ?>" data-type="<?php echo $row['file_type'] ?>" style="display: none">

                                                </td>
                                                <td><i class="to_file"><?php echo date('Y/m/d h:i A',strtotime($row['date_updated'])) ?></i></td>
                                                <td><i class="to_file"><?php echo $row['description'] ?></i></td>
                                            </tr>
                                                
                                        <?php endwhile; ?>
                                        </table>
                                        
                                    </div>
                                </div>
                                
                            </div>
                 
                    </div>
                </div>

                            <?php 

                            if($_SESSION["admin"] == "1" ){

                                echo '<div id="menu-folder-clone" style="display: none;">
                                <a href="javascript:void(0)" class="custom-menu-list file-option edit"> <i class="fas fa-pencil-alt fa-lg"></i> &nbsp;Editar</a>
                                <a href="javascript:void(0)" class="custom-menu-list file-option delete"><i class="fas fa-trash-alt fa-lg" ></i> &nbsp; Eliminar </a>
                            </div>';

                            }

                            ?>
                 <?php 

            if($_SESSION["admin"] == "1" ){

                echo ' <div id="menu-file-clone" style="display: none;">
                <a href="javascript:void(0)" class="custom-menu-list file-option edit"><span><i class="fa fa-edit"></i> </span>Renombrar</a>
                <a href="javascript:void(0)" class="custom-menu-list file-option download"><span><i class="fa fa-download"></i> </span>Descargar</a>
                <a href="javascript:void(0)" class="custom-menu-list file-option delete"><span><i class="fa fa-trash"></i> </span>Eliminar</a>
                <a href="javascript:void(0)" class="custom-menu-list file-option ver"><span><i class="fas fa-eye"></i></span>Visualizar</a>
            </div> ';

            }else if($_SESSION["admin"] == "0" ){

                echo ' <div id="menu-file-clone" style="display: none;">
                <a href="javascript:void(0)" class="custom-menu-list file-option download"><span><i class="fa fa-download"></i> </span>Descargar</a>
                <a href="javascript:void(0)" class="custom-menu-list file-option ver"><span><i class="fas fa-eye"></i></span>Visualizar</a>
            </div> ';
            }

            ?>

              

        </div>
            <!-- End of Main Content -->

            <?php 

            require_once 'Layouts/footer.php'

            ?>
            <!-- End of Footer -->

     </div>
        <!-- End of Content Wrapper -->

</div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <script>
	
    $('#new_folder').click(function(){
        uni_modal('Nueva Carpeta','manage_folder.php?fid=<?php echo $folder_parent ?>')
    })
    $('#new_file').click(function(){
        uni_modal('Nuevo Archivo','manage_files.php?fid=<?php echo $folder_parent ?>')
    })
    $('.folder-item').dblclick(function(){
        location.href = 'files.php?page=files&fid='+$(this).attr('data-id')
    })
    $('.folder-item').bind("contextmenu", function(event) { 
    event.preventDefault();
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu'></div>")
        custom.append($('#menu-folder-clone').html())
        custom.find('.edit').attr('data-id',$(this).attr('data-id'))
        custom.find('.delete').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
    custom.css({top: event.pageY + "px", left: event.pageX + "px"});

    $("div.custom-menu .edit").click(function(e){
        e.preventDefault()
        uni_modal('Editar carpeta','manage_folder.php?fid=<?php echo $folder_parent ?>&id='+$(this).attr('data-id') )
    })
    $("div.custom-menu .delete").click(function(e){
        e.preventDefault()
        _conf("¿Estás seguro de eliminar esta carpeta?",'delete_folder',[$(this).attr('data-id')])
    })
})

    //FILE
	$('.file-item').bind("contextmenu", function(event) { 
    event.preventDefault();

    $('.file-item').removeClass('active')
    $(this).addClass('active')
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu file'></div>")
        custom.append($('#menu-file-clone').html())
        custom.find('.edit').attr('data-id',$(this).attr('data-id'))
        custom.find('.delete').attr('data-id',$(this).attr('data-id'))
        custom.find('.download').attr('data-id',$(this).attr('data-id'))
        
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});

	$("div.file.custom-menu .edit").click(function(e){
		e.preventDefault()
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').siblings('large').hide();
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').show();
	})
	$("div.file.custom-menu .delete").click(function(e){
		e.preventDefault()
		_conf("Are you sure to delete this file?",'delete_file',[$(this).attr('data-id')])
	})
	$("div.file.custom-menu .download").click(function(e){
		e.preventDefault()
		window.open('download.php?id='+$(this).attr('data-id'))
	})

	$('.rename_file').keypress(function(e){
		var _this = $(this)
		if(e.which == 13){
			start_load()
			$.ajax({
				url:'ajax.php?action=file_rename',
				method:'POST',
				data:{id:$(this).attr('data-id'),name:$(this).val(),type:$(this).attr('data-type'),folder_id:'<?php echo $folder_parent ?>'},
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp);
						if(resp.status== 1){
								_this.siblings('large').find('b').html(resp.new_name);
								end_load();
								_this.hide()
								_this.siblings('large').show()
						}
					}
				}
			})
		}
	})

})
//FILE


    $('.file-item').click(function(){
        if($(this).find('input.rename_file').is(':visible') == true)
        return false;
        uni_modal($(this).attr('data-name'),'manage_files.php?<?php echo $folder_parent ?>&id='+$(this).attr('data-id'))
    })
    $(document).bind("click", function(event) {
    $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

});
    $(document).keyup(function(e){

    if(e.keyCode === 27){
        $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

    }

});
  
    function delete_folder($id){
        start_load();
        $.ajax({
            url:'ajax.php?action=delete_folder',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                console.log(resp);
                if(resp == 1){
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
                    toastr.success("Carpeta eliminada correctamente.")
                        setTimeout(function(){
                            location.reload()
                        },1500)
                        
                }
                  else {
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
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    toastr.error("No se pudo eliminar, la carpeta tiene archivos o subcarpetas.")

                        setTimeout(function(){
                            location.reload()
                        },2000)
                        
                }
            }
        })
    }
    function delete_file($id){
        start_load();
        $.ajax({
            url:'ajax.php?action=delete_file',
            method:'POST',
            data:{id:$id},
            success:function(resp){
           console.log(resp)
                if(resp == 1){
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
                    toastr.success("Archivo eliminado correctamente.")
                        setTimeout(function(){
                            location.reload()
                        },1500)
                }
                else{
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
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }

                    toastr.error("No se pudo eliminar el archivo.")
                     setTimeout(function(){
                            location.reload()
                        },2000)

                }
            }
        })
    }

</script>


    <?php 

require_once 'Layouts/librerias.php'

?>




<script src="../Views/Layouts/fotoperfil.js"></script>

<div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#2B0082 ;color: white;">
        <h5 class="modal-titdfgle" >Confirmación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span>
            </button>
      </div>
      <div class="modal-body" style="font-size: 20; text-align:center;">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-dark" id='confirm' onclick="">Aceptar</button>
      </div>
      </div>
    </div>
</div>


<div class="modal fade" id="uni_modal"  tabindex="-1" role='dialog'  >
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#2B0082 ;color: white;">
        <h5 class="modal-title" style="color: #ffffff;"></h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span>
            </button>
            
        </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-dark" id='submit' onclick="$('#uni_modal form').submit()">Guardar</button>
     
      </div>
      </div>
    </div>
  </div>

</body>
<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
</script>	
  
<script>
	//FILE
	$('.file-item').bind("contextmenu", function(event) { 
    event.preventDefault();

    $('.file-item').removeClass('active')
    $(this).addClass('active')
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu file'></div>")
        custom.append($('#menu-file-clone').html())
        custom.find('.edit').attr('data-id',$(this).attr('data-id'))
        custom.find('.delete').attr('data-id',$(this).attr('data-id'))
        custom.find('.download').attr('data-id',$(this).attr('data-id'))

        custom.find('.ver').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});

    $("div.file.custom-menu .edit").click(function(e){
		e.preventDefault()
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').siblings('large').hide();
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').show();
	})
	$("div.file.custom-menu .delete").click(function(e){
		e.preventDefault()
		_conf("¿Estás seguro de eliminar este archivo?",'delete_file',[$(this).attr('data-id')])
	})
	$("div.file.custom-menu .download").click(function(e){
		e.preventDefault()
		window.open('download.php?id='+$(this).attr('data-id'))
	})
    $("div.file.custom-menu .ver").click(function(e){
  
     id = $(this).attr('data-id')
     window.open('visualizar.php?id='+$(this).attr('data-id'))


	})

	

})
	$(document).bind("click", function(event) {
    $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

});
	$(document).keyup(function(e){

    if(e.keyCode === 27){
        $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

    }
})


</script>

</html>

