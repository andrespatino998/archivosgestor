<?php 


include_once '../Controllers/NuevaFoto.php';

//CONSULTA PARA LLENAR LOS DEPARTAMENTOS DEL FORMULARIO AL MODIFICAR
$departamentos = $obj->Ejecutar_Instruccion("SELECT * FROM departamentos");

?>

 <title>Reporte de Usuarios</title>

<!-- Custom fonts for this template -->
<link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet"  type="text/css" href="../Util/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

     
    <!-- Custom styles for this template -->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../Util/Css/fotoperfil3.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Util/Css/datatables.min.css"/>
    <!-- Custom styles for this page -->
    <link href="../Util/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"  type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  


      <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">

      <link href="../Util/Css/toastr.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      

   
      <link href="../Util/Css/mobiscroll.jquery.min.css" rel="stylesheet" />
<style>



.btn-group, .btn-group-vertical {
    position: absolute !important;
}
textarea {
  
    resize: none;
}

</style>


<script type="text/javascript">


    function validateFileType(){
        var fileName = document.getElementById("file-ip-1").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            Swal.fire({
            icon: 'error',
            title: 'Solo se permiten imagenes',
        })
        setTimeout(() => {  location.reload(); }, 2000);
        }   
    } 



</script>
<div class="container-fluid">
 


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
       
            <h1 class="h3 mb-0 text-gray-800">Empleados dados de Baja</h1>
           
        </div>
  
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablaUsuarios" width="100%" >
                        <thead>
                            <tr>
                                <th >Id</th>
                                <th >Nombre</th>
                                <th>Correo Electrónico</th>
                                <th >Contraseña</th>
                                <th>Fotografia Actualizada</th>
                                <th>Id Departamento</th>
                                <th>Departamento</th>
                                <th>Nivel de Criticidad</th>
                                <th>Fecha de Ingreso</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                                <th>Contacto de Emergencia</th>
                                <th>Domicilio </th>
                                <th>RFC</th>
                                <th>CURP</th>
                                <th>IMSS</th>
                                <th>Tipo de Sangre</th>
                                <th>Carta Antecedentes NO Penales</th>
                                <th>Examen Toxicologico</th>
                                <th>Enfermedades</th>
                                <th>Administrador</th>
                                <th>Vacaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

     <?php
                       
                        $date = date("Y") . "-" . date("m") . "-" . date("d");
                        $datetime = strtotime($date . "-15 years");
                        $date = date("Y-m-d", $datetime);
                        

?>
<!--Modal para CRUD-->
<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="max-width:1250px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button"  id="btnSuperior" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span>
                </button>
            </div>
        <form id="formUsuarios" enctype="multipart/form-data" >    
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"   onkeypress="return sololetras(event)" >
                        
                        </div>
                    </div>  

                     <div class="col-lg-3">
                          <div class="form-group">
                              <label for="correo" class="col-form-label">Correo</label>
                              <input type="email" class="form-control" id="correo" name="correo" >
                            </div>               
                      </div> 

                      <div class="col-lg-3">
                         <div class="form-group">
                            <label for="contrasena" id="etiquetacontrasena" name="etiquetacontrasena" class="col-form-label">Contraseña</label>
                            <div class="input-group">
                             
                                    <input type="password" id="contrasena" name="contrasena" class="form-control">
                                        <div class="input-group-append">
                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                            </div>
                            </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                                <label for="id_departamento" class="col-form-label">Departamento</label>
                                <select type="text"  id="id_departamento" name="id_departamento"class="form-control">
                                <option value="" selected>Seleccione un Departamento</option>
                  
                               <?php               foreach ($departamentos as $renglon) { 
                                                echo $renglon['id'] ; ?>
                                    <option  value="<?php echo $renglon[0] ?>"><?php echo$renglon[1] ?></option>

                                <?php  }?> 
                                </select>


                            </div>  
                    </div>
                </div>

                <div class="row">

                  
                    <div class="col-lg-3">
                          <div class="form-group">
                              <label for="fecha_ingreso" class="col-form-label">Fecha de Ingreso</label>
                              <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                            </div>               
                      </div> 

                      <div class="col-lg-3">
                          <div class="form-group">
                              <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento</label>
                               <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"  min="1960-01-01" max= "<?php echo $date; ?>">
                            </div>               
                      </div> 


                    
                      <div class="col-lg-3">
                          <div class="form-group">
                              <label for="telefono" class="col-form-label">Telefono</label>
                              <input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return numeros(event)"  maxlength="10" >
                            </div>               
                      </div> 

                      <div class="col-lg-3">
                          <div class="form-group">
                              <label for="celular" class="col-form-label">Celular</label>
                              <input type="text" class="form-control" id="celular" name="celular"  onkeypress="return numeros(event)"  maxlength="10" >
                            </div>               
                      </div> 

                   
                </div>

                 <div class="row">
                         <div class="col-lg-1"></div> 
                         <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="imss" class="col-form-label">IMSS</label>
                                    <input type="text" class="form-control" id="imss" name="imss"  onkeypress="return numeros(event)"  maxlength="11" >
                                </div>               
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="curp" class="col-form-label">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp"  onkeyup ="CURP()"onkeypress="return solomayusculas(event)" maxlength="18" >
                                </div>               
                           </div> 
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="rfc" class="col-form-label">RFC</label>
                                <input type="text" class="form-control" id="rfc" name="rfc"  onkeyup ="RFC()"onkeypress="return solomayusculas(event)" maxlength="13" >
                            </div>               
                        </div>     
                        
                        <div class="col-lg-1"></div> 

                 </div>
                 <div class="row">
                    <div class="col-lg-1"></div> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="carta_antecedentes" class="col-form-label">Carta de Antecedentes NO Penales</label>
                                    <input type="date" class="form-control" id="carta_antecedentes" name="carta_antecedentes">
                                </div>               
                            </div>     
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="examen_tox" class="col-form-label">Examen Toxicologico</label>
                                    <input type="date" class="form-control" id="examen_tox" name="examen_tox">
                                </div>               
                            </div> 
                            <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="imss" class="col-form-label">Tipo de Sangre</label>
                                        <select type="text" class="form-control"  id="tipo_sangre" name="tipo_sangre" >
                                            <option  value="" selected>Selecciona el tipo de sangre</option >
                                            <option value="A+">A+</option>
                                            <option value="O+">O+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="A-">A-</option>
                                            <option value="O-">O-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>               
                            </div>
                        <div class="col-lg-1"></div> 
                 </div>

                 <div class="row">
                 
                    <div class="col-lg-1"></div> 
                            
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="enfermedades" class="col-form-label">Enfermedades</label>
                                    <textarea type="text" class="form-control" id="enfermedades" name="enfermedades" rows="2" cols="10" ></textarea>
                                </div> 
                             </div> 
                             <div class="col-lg-4">
                                <div class="form-group">
                                        <label for="contacto_emergencia" class="col-form-label">Contaco de Emergencia</label>
                                        <textarea type="text" class="form-control" id="contacto_emergencia" name="contacto_emergencia" rows="2" cols="10" ></textarea>              
                                </div> 
                        </div>
                        <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="domicilio_anterior" class="col-form-label">Domicilio </label>
                                    <textarea type="text" class="form-control" id="domicilio_anterior" name="domicilio_anterior" rows="2" cols="10" ></textarea>
                                </div> 
                        </div> 
                        <div class="col-lg-1"></div> 
                </div>
                    
                <div class="row">
                    <div class="col-lg-8"></div> 
                        <div class="col-lg-2">
                            <div class="squaredTwo" align="left">
                                <label for="squaredTwo" class="col-form-label">Tipo de Usuario</label>
                                    <select type="text" class="form-control"  id="squaredTwo" name="squaredTwo" >
                                            <option value="0" selected>Empleado</option>
                                            <option value="1">Administrador</option>
                                    </select>
                                </div>     
                        </div>  
                    <div class="col-lg-2"></div>     
                </div>  
            </div><!-- FINAL DE MODAL BODY   -->
    
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>

                
            </div>

        </form>    
     
    </div>
    </div>
</div>  



<!-- Modal -->
<div class="modal fade" id="modalNuevaFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#2B0082; color: white; ">
                <h5 class="modal-title" id="titulo">Cambiar Foto de Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span>
                </button>
            </div>
        <form id="NuevaFotoUsuario" enctype="multipart/form-data" method="post">    
            <div class="modal-body">
            <div class="row" >
                    <div class="col-lg-12" >

                        <center><h1 for="nombre" class="col-form-label" id="nombreemp"style="font-size:25;"></h1></center>

                    </div>  
                </div>
                <div class="row" hidden>
                    <div class="col-lg-12" >
                        <div class="form-group"> 
                            <label for="nombre" class="col-form-label">ID</label>
                            <input type="text" class="form-control"  id="txtid" name="txtid"  value="">
                            
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="center">
                                <div class="form-input " >
                                    <label for="file-ip-1" >Elegir Imagen</label>
                             <input type="file" class="form-control"  style="width:100%" id="file-ip-1"  accept="image/*"  name="avatar" onchange="showPreview(event), validateFileType()"  >
                                        <div class="preview"> 
                                        <img id="file-ip-1-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnCancelar1">Cancelar</button>
                <input type="submit" id="btninsertar" name="btninsertar" class="btn btn-dark" value="Modificar" >
            </div>
        </form>    
    </div>
    </div>
</div>  




<!-- Modal -->
<div class="modal fade" id="modalFecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#2B0082; color: white; ">
                <h5 class="modal-title" id="titulo">Vacaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span>
                </button>
            </div>
        <form id="formVacaciones"  method="post">    
            <div class="modal-body">
                <div class="row" hidden>
                    <div class="col-lg-12" >
                        <div class="form-group"> 
                            <label for="nombre" class="col-form-label">ID</label>
                            <input type="text" class="form-control"  id="txtid" name="txtid"  value=""> 
                        </div>
                    </div>  
                </div>
                <div clasa="row">
                    <div class="col-lg-12">
                            <label for="" class="col-form-label">Empleado: </label>
                                    <div class="form-group"> 
                                         <input type="text" class="form-control" id="empleado" style="font-size:20;" readonly>
                                    </div>
                                <div class="form-group" hidden>
                                <label for="" class="col-form-label">Vacaciones Actuales</label>
                                    <input  type="text" class="form-control" id="fecha" style="font-size:20;" >
                                </div>

                                <label for="" class="col-form-label">Fecha de Inicio</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control"  id="inicio" name="inicio"  value=""> 
                                    </div>
                                <label for="" class="col-form-label">Fecha Final</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control"  id="final" name="final"  value=""> 
                                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnCancelar3">Cancelar</button>
                <button type="submit" id="btnGuardar2" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
    </div>
    </div>
</div>  



                      
    <script src="../Util/Js/sb-admin-2.min.js"></script>


    <script src="../Util/Js/jquery-3.3.1.min.js"></script>
    <script src="../Util/Js/bootstrap.min.js"></script>
    <script src="../Util/Js/popper.min.js"></script>
   
    <script src="Layouts/fotoperfil.js"></script>


    


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
    <script type="text/javascript" src="tabla2.js"></script>
    <script type="text/javascript" src="validaciones.js"></script>


    <script src="../Util/Js/jquery.validate.min.js"></script>
    <script src="../Util/Js/additional-methods.min.js"></script>


