<?php
include("../config/config.php");

$id = $_GET["id"];
$cedula = base64_decode($_GET["student"]);
$cedula_encript = base64_encode($_GET["student"]);

$sql = "DELETE FROM boletines WHERE id = '$id'";
$query = $con->query($sql);
if ($query != null) {
    print "<script>alert(\"El boletín ha sido eliminado correctamente\");window.location='https://bolefast.eddukate.org/estudiante?c=$cedula_encript';</script>";
} else {
    print "<script>alert(\"Hubo un error al eliminar el boletín, pruebe mas tarde.\");window.location='https://bolefast.eddukate.org/estudiante?c=$cedula_encript';</script>";
}
