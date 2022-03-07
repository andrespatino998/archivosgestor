<?php

include_once('pdf.php');
include_once('conexion/myDBC.php');
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B', 20);
//Margen decorativo iniciando en 0, 0
$pdf->Image('margen.png', 0,0, 210, 295, 'PNG');
 $pdf->Image( '../Util/Img/Logo.png', 15, 17, 50, 40, 'PNG');


//Texto de Título
$pdf->SetXY(60, 25);
$pdf->MultiCell(90, 10, utf8_decode('DATOS PERSONALES DEL EMPLEADO'), 0, 'C');
 
//Texto Explicativo

 
//De aqui en adelante se colocan distintos métodos
//para diseñar el formato.
 
//Fecha
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(145,60);
$pdf->Cell(15, 8, 'ID:', 0, 'L');
$pdf->Line(163, 65.5, 185, 65.5);
 
//Nombre //Apellidos //DNI //TELEFONO
$pdf->SetXY(25, 65);
$pdf->Cell(20, 8, 'NOMBRE:', 0, 'L');
$pdf->Line(47, 70.5, 140, 70.5);

$pdf->SetXY(25, 79);
$pdf->Cell(20, 8, 'PUESTO:', 0, 'L');
$pdf->Line(47, 84, 140, 84);
//*****
$pdf->SetXY(25,93);
$pdf->Cell(19, 8, 'CORREO:', 0, 'L');
$pdf->Line(48, 98, 140,98);
//*****
$pdf->SetXY(25, 107);
$pdf->Cell(10, 8, 'FECHA INGRESO:', 0, 'L');
$pdf->Line(63, 112, 85, 112);
//*****
$pdf->SetXY(90, 107);
$pdf->Cell(10, 8, utf8_decode('NACIMIENTO:'), 0, 'L');
$pdf->Line(128, 112, 154, 112);

$pdf->SetXY(90, 121);
$pdf->Cell(10, 8, utf8_decode("TELÉFONO CASA:"), 0, 'L');
$pdf->Line(128, 126, 154, 126);

$pdf->SetXY(25, 121);
$pdf->Cell(10, 8, 'CELULAR:', 0, 'L');
$pdf->Line(50, 126, 75, 126);

$pdf->SetXY(25, 135);
$pdf->Cell(10, 8, 'CONTACTO EMERGENCIA:', 0, 'L');
$pdf->Line(81, 140, 195, 140);

$pdf->SetXY(25, 149);
$pdf->Cell(10, 8, 'DOMICILIO ANTERIOR:', 0, 'L');
$pdf->Line(74, 154, 195, 154);

$pdf->SetXY(25, 163);
$pdf->Cell(10, 8, 'RFC:', 0, 'L');
$pdf->Line(37, 169, 76, 169);

$pdf->SetXY(77, 163);
$pdf->Cell(10, 8, 'CURP:', 0, 'L');
$pdf->Line(92, 168, 139, 168);

$pdf->SetXY(145, 163);
$pdf->Cell(10, 8, 'TIPO DE SANGRE:', 0, 'L');
$pdf->Line(186, 169, 191, 169);

$pdf->SetXY(25, 177);
$pdf->Cell(10, 8, 'IMSS:', 0, 'L');
$pdf->Line(37, 182, 65, 182);

$pdf->SetXY(68, 177);
$pdf->Cell(10, 8, 'CARTA DE ANTECEDENTES:', 0, 'L');
$pdf->Line(128, 182, 150, 182);

$pdf->SetXY(25, 191);
$pdf->Cell(10, 8, utf8_decode("EXAMEN TOXICOLÓGICO:"), 0, 'L');
$pdf->Line(80, 196, 102, 196);

$pdf->SetXY(25, 205);
$pdf->Cell(10, 8, 'ENFERMEDADES:', 0, 'L');
$pdf->Line(65, 210, 195, 210);



//LICENCIATURA  //CARGO   //CÓDIGO POSTAL

 
//Creamos objeto de myDBC y se llama al método
//que traerá el arreglo con la información de
//una persona, y se guarda en $datosConsulta
$seleccion = new myDBC();
$datosConsulta = $seleccion->seleccionar_datos();
 
//Arreglo de coordenadas
//Basadas en la primera coordenada de Line
$misCoordenadas = array(
                        array('x' => 165, 'y' => 59), //id
                       array('x' => 47, 'y' => 65), //nombre
                        array('x' => 47, 'y' => 92), //correo
                        array('x' => 59, 'y' => 98), //contraseña
                        array('x' => 0, 'y' =>0 ), //avatar
                         array('x' => 62, 'y' =>107 ), //Fecha de Ingreso
                         array('x' => 128, 'y' =>107 ), //fecha de Nacimiento
                         array('x' => 128, 'y' =>121 ), //Telefono de Casa
                         array('x' => 50, 'y' =>121), //Telefono cel
                         array('x' => 80, 'y' =>135 ), //Emergencia
                           array('x' => 75, 'y' =>149 ), //Dimicilio anterior
                           array('x' => 36, 'y' =>164 ), //RFC
                            array('x' => 91, 'y' =>163 ), //CURP
                              array('x' => 37, 'y' =>177 ), //IMSS
                              array('x' => 185, 'y' =>163 ), //tipo de sangre
                               array('x' => 127, 'y' =>177), //CARTA DE ANTECEDENTES
                                 array('x' => 79, 'y' =>191 ), //examen toxicologico
                                 array('x' => 65, 'y' =>205 ), //enfermades
                                 array('x' => 47, 'y' =>78 ), //puesto





                  );

//Este paso es un "truco" para poder iterar el arreglo
//de la consulta y recorrer uno a uno cada elemento.
 
//Crear un arreglo
$arreglo = array();
//Convertirlo en arreglo con índices
for($i = 0; $i < count($datosConsulta); $i++){
    foreach($datosConsulta[$i] as $clave=>$valor){
        $arreglo[] = $valor;
    }
}
 
//Ahora se usará este $arreglo junto con $mis Coordenadas
//Se obtiene un elemento de la consulta y un par de coordenadas
//que serán pasado a SetXY y Cell
for($i = 0; $i < count($misCoordenadas); $i++)
{
	if ($i <> 3 && $i<>4)
	{
    $pdf->SetXY($misCoordenadas[$i]['x'], $misCoordenadas[$i]['y']);
   
    $pdf->Cell(40, 7, utf8_decode($arreglo[$i]), 0); 
    $pdf->Image( $arreglo[4], 160, 25, 27, 25);
	}
}

$cumpleanos = new DateTime($arreglo[6]);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);


  $pdf->SetXY(145, 79);
$pdf->Cell(20, 8, 'EDAD: '.$annos->y , 0, 'L');
$pdf->Line(170, 85, 160, 85);
 
$pdf->Output(); //Salida al navegador
 
?>