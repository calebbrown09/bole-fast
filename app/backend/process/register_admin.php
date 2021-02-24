<?php


if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["cedula"]) &&isset($_POST["password"]) &&isset($_POST["colegio"])){
		if($_POST["name"]!=""&& $_POST["cedula"]!=""&&$_POST["password"]!=""&&$_POST["colegio"]){
			include "../config/config.php";
			
			$found=false;
			$sql1= "select * from usuarios where num_cedula=\"$_POST[cedula]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"El estudiante ya esta registrado en la plataforma\");window.location='https://bolefast.eddukate.org/register';</script>";
            }else {
                $pass = md5($_POST['password']);
                $sql = "insert into usuarios(nombre_completo,num_cedula,password,colegio,id_rol,fecha_creacion) 
                value (\"$_POST[name]\",\"$_POST[cedula]\",\"$pass\",\"$_POST[colegio]\", \"2\", NOW())";
    			$query = $con->query($sql);
    			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='https://bolefast.eddukate.org/';</script>";
			    }
            }
            
            
		}
	}
}



?>