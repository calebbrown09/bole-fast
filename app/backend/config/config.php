<?php 


$host = "127.0.0.1";
$user = "";
$password = "";
$db = "";
$con = mysqli_connect($host, $user, $password, $db);


// Funciones

// Generador de Token unico
function token($longitud)
{
    if ($longitud < 4) {
        $longitud = 4;
    }
 
    return bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
}

// Formatear Fecha y Hora

function FormatearFecha($fecha)
{
    return
        date('j M Y -  g:i a', strtotime($fecha));
}
?>
