<?php
class myDBC {
    public $mysqli = null;
 
    public function __construct() {
 
        include_once "dbconfig.php";
        $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 
        if ($this->mysqli->connect_errno) {
            echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno.") " . $this->mysqli->connect_error;
            exit();
        }
        $this->mysqli->set_charset("utf8");
    }
 
    public function __destruct() {
        $this->CloseDB();
    }
 
    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }
 
    public function CloseDB() {
        $this->mysqli->close();
    }
 
    public function clearText($text) {
        $text = trim($text);
        return $this->mysqli->real_escape_string($text);
    }
 
    public function seleccionar_datos()
    {

        $PHPvariable = $_GET['id'];

        $q = "SELECT usuarios.id,usuarios.nombre,usuarios.correo,usuarios.contrasena,usuarios.avatar,usuarios.fecha_ingreso,usuarios.fecha_nacimiento,usuarios.telefono,usuarios.celular,usuarios.contacto_emergencia,usuarios.domicilio_anterior,usuarios.rfc,usuarios.curp,usuarios.imss,usuarios.tipo_sangre,usuarios.carta_antecedentes,usuarios.examen_tox,usuarios.enfermedades,departamentos.departamento FROM usuarios inner join departamentos on usuarios.id_departamento = departamentos.id WHERE usuarios.id =".$PHPvariable;



        $result = $this->mysqli->query($q);
 
        //Array asociativo que contendrá los datos
        $valores = array();
 
        if( $result->num_rows == 0)
        {
            echo'<script type="text/javascript">
                alert("ningun registro");
                </script>';
        }
 
        else{
            while($row = mysqli_fetch_assoc($result))
            {
                //Se crea un arreglo asociativo
                array_push($valores, $row);
            }
        }
        //Regresa array asociativo
        return $valores;
    }



}
?>

    