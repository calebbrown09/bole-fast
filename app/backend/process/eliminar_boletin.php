<?php

include "../config/config.php";

// Variables

$id = $_GET['id'];
$cedula = base64_decode($_GET['student']);

if (isset($_GET['reactivar'])) {
    $boletin = "UPDATE boletines SET activo = 1 WHERE id = '$id' AND num_cedula = '$cedula'";
    $query = $con->query($boletin);
    if ($query != null) {
        print "<script>alert(\"El boletín se ha reactivado correctamente\");window.location='https://bolefast.eddukate.org/estudiante?c=$_GET[student]';</script>";
    } else {
        print "<script>alert(\"Hubo un error al reactivar el boletín, pruebe mas tarde.\");window.location='https://bolefast.eddukate.org/estudiante?c=$_GET[student]';</script>";
    }
} else {
    $boletin = "UPDATE boletines SET activo = 0 WHERE id = '$id' AND num_cedula = '$cedula'";
    $query = $con->query($boletin);
    if ($query != null) {
        print "<script>alert(\"El boletín se ha desabilitado correctamente\");window.location='https://bolefast.eddukate.org/estudiante?c=$_GET[student]';</script>";
    } else {
        print "<script>alert(\"Hubo un error al desabilitar el boletín, pruebe mas tarde.\");window.location='https://bolefast.eddukate.org/estudiante?c=$_GET[student]';</script>";
    }
}
