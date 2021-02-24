<?php 


include "../config/config.php";
session_start();
session_destroy();
print "<script>window.location='https://bolefast.eddukate.org/';</script>";

?>