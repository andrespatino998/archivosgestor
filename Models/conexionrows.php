<?php 

$mysqli = new mysqli("localhost", "root", "", "agestor1");

/* Comprueba la conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    
?>