<?php

define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASSWORD","");
define("BD","agestor1");


function conexion()
{
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $db_name = "agestor1";


    
    return $conexion=mysqli_connect($host_db,$user_db,$pass_db,$db_name);
}
function tabla_usuarios()
{            
    return "usuarios";
}

?>