<?php 


error_reporting(1);

 include_once "../Models/conexionrows.php";

 $mysqli->query("DELETE from departamentos where id = '".$_GET['id']."'");
    
    //VERIFICAR QUE VALOR TE DA
    echo "<h1  value=printf('Affected rows (DELETE): %d\n', $mysqli->affected_rows)'>";
    echo "</h1 hidden>";

//1 SI SE PUDO HACER LA CONSULTA
    if($mysqli->affected_rows == 1){

        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'El departamento se ha eliminado correctamente!',
          })
         </script>";
    }
    //-1 NO SE PUDO HACER LA CONSULTA
    else if($mysqli->affected_rows == -1){
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El departamento tiene empleados asociados a el, Porfavor elimina primero el empleado!',
          })
         </script>";
    }
?>
 
 
 <title>Reporte de Departamentos</title>

<!-- Custom fonts for this template -->
<link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet"  type="text/css" href="../Util/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

     
    <!-- Custom styles for this template -->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../Util/Css/datatables.min.css"/>
    <!-- Custom styles for this page -->
    <link href="../Util/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"  type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  


      <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">

      <link href="../Util/Css/toastr.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
    <script type="text/javascript">
    
  function sololetras(e)
{
      var estatus =false;

       key=e.keyCode || e.which;
        tecla=String.fromCharCode(key).toLowerCase();
         letras=" abcdefghijklmnñopqrstuvwxyz";

  for(var i=0;i<letras.length;i++)
  {


    if (tecla==letras[i])
        {


          estatus=true;
        }

  }
  return estatus;
}



    </script>

<style>



.btn-group, .btn-group-vertical {
    position: absolute !important;
}

.alta{
   
 color: red;
  
}

.media{
  
color: yellow;
}

.baja{

  color: green;
}
.red {
  background-color: red !important;
}

</style>


<!-- <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script> -->


<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Departamentos / Áreas </h1>
            <button  id="btnNuevo" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-bs-toggle="modal" ><i class="fas fa-plus-square fa-sm text-white-50"></i> Nuevo Departamento</button>
        </div>
  
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablaDepartamentos" width="100%" >
                        <thead>
                            <tr>
                                <th style="font-size: 18px;">Id</th>
                                <th style="font-size: 18px">Departamento</th>
                                <th style="font-size: 18px">Nivel de Criticidad</th>
                                <th style="font-size: 18px">Acciones</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<!--Modal para CRUD-->
<div class="modal fade" id="modalDepartamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span>
                </button>
            </div>
        <form id="formDepartamentos" enctype="multipart/form-data" >    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="departamento" class="col-form-label">Nombre del Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" onkeypress="return sololetras(event)" >
                        </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nivel_criticidad" class="col-form-label">Nivel de Criticidad</label>
                     
                                    <select  class="form-control" id="nivel_criticidad" name="nivel_criticidad"  required>
                                        <option value="Criticidad Alta" >Criticidad Alta</option>
                                        <option value="Criticidad Media" >Criticidad Media</option>
                                        <option value="Criticidad Baja" >Criticidad Baja</option>
                                    </select>
                        </div>               
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
    </div>
    </div>
</div>  

<!-- Modal -->
<!-- Bootstrap core JavaScript
<script src="../Util/vendor/jquery/jquery.min.js"></script>
    <script src="../Util/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

    <!-- Core plugin JavaScript
    <script src="../Util/vendor/jquery-easing/jquery.easing.min.js"></script>-->

 
    <!-- Custom scripts for all pages-->
    <script src="../Util/Js/sb-admin-2.min.js"></script>


    <script src="../Util/Js/jquery-3.3.1.min.js"></script>
    <script src="../Util/Js/bootstrap.min.js"></script>
    <script src="../Util/Js/popper.min.js"></script>
   


    <script type="text/javascript" src="../Util/datatables/datatables.min.js"></script>


    <script src="../Util/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="../Util/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="../Util/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="../Util/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../Util/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <!-- Page level plugins 
    <script src="../Util/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../Util/vendor/datatables/dataTables.bootstrap4.min.js"></script>-->

    <!-- Page level custom scripts
    <script src="../Util/Js/demo/datatables-demo.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>


    <script src="../Util/Js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../Util/Js/toastr.min.js"></script>
    <script type="text/javascript" src="tabladepartamentos.js"></script>


    <script src="../Util/Js/jquery.validate.min.js"></script>
    <script src="../Util/Js/additional-methods.min.js"></script>
