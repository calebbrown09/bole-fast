<?php 


$cedula = $_POST['cedula'];
$cedula_encript= base64_encode($cedula);

print "<script>window.location='https://bolefast.eddukate.org/estudiante?c=$cedula_encript';</script>";


?>