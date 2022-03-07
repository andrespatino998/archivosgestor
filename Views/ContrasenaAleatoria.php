<?php
$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$';

$longitud = 10;

echo substr(str_shuffle($caracteres), 0, $longitud);

?>
