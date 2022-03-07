<script src="../Util/Js/webviewer.min.js"></script>

<?php  
			
			  
			include_once '../Models/conexion_bd.php';
			$obj = new BD_PDO();
			
			
			$archivo = $obj->Ejecutar_Instruccion("SELECT * FROM files where id=".$_GET['id']);

            $extension = $archivo[0]["file_type"];
            $ruta = $archivo[0]["file_path"];

          
            $viewer = '<script>
            WebViewer({
              path: "lib", 
              licenseKey: "Insert commercial license key here after purchase",
              initialDoc: "../assets/uploads/'. $ruta.'",
       
            }, document.getElementById("viewer"))
            .then(instance => {
              const docViewer = instance.docViewer;
              const annotManager = instance.annotManager;
              + instance.setTheme("dark");
              + instance.disableElements(["toolbarGroup-Shapes"]);
              + instance.disableElements(["toolbarGroup-Edit"]);
              + instance.disableElements(["toolbarGroup-Insert"]);
              + instance.disableElements(["toolbarGroup-Annotate"]);
              + instance.disableElements(["toolsHeader"]);
              + instance.disableElements(["searchButton"]);
              + instance.disableElements(["panToolButton"]);
      
              docViewer.on("documentLoaded", () => {
 
              });
              
              
            });
              
           

          </script>';



           switch($extension){
                case 'pdf':
                    echo '<div id="viewer" style="width: 100%; height: 100%; margin: 0 auto;"></div>';
                    echo $viewer;
                    break;

                case 'jpg' || 'png' || 'jpeg':
                    echo '<div id="viewer" style="width: 100%; height: 100%; margin: 0 auto;"></div>';
                    echo $viewer;
                    break;

                case 'docx' || 'doc':
                    echo '<div id="viewer" style="width: 100%; height: 100%; margin: 0 auto;"></div>';
                    echo $viewer;
                    break;

                case 'xlsx':
                    echo '<div id="viewer" style="width: 100%; height: 100%; margin: 0 auto;"></div>';
                    echo $viewer;
                    break;

                case 'pptx' || 'ppt':
                    echo '<div id="viewer" style="width: 100%; height: 100%; margin: 0 auto;"></div>';
                    echo $viewer;
                    break;

           }


 ?>