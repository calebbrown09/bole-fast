<?php

if (!empty($_POST)) {
	if (isset($_POST["cedula"]) && isset($_POST["password"])) {
		if ($_POST["cedula"] != "" && $_POST["password"] != "") {
			include "../config/config.php";

			$password = md5($_POST["password"]);
			$user_id = null;
			$sql1 = "select * from usuarios where (num_cedula=\"$_POST[cedula]\" and password=\"$password\")";

			$query = $con->query($sql1);
			while ($r = $query->fetch_array()) {
				$user_id = $r["id"];
				break;
			}
			if ($user_id == null) {
				print "<script>alert(\"Acceso invalido.\");window.location='https://bolefast.eddukate.org/register';</script>";
			} else {
				session_start();
				$_SESSION["user_id"] = $user_id;

				$sql_db_user = "SELECT * from usuarios WHERE id = '$_SESSION[user_id]'";
				$result = mysqli_query($con, $sql_db_user);
				while ($app = mysqli_fetch_array($result)) {

					switch ($app['id_rol']) {
						case '1':
							print "<script>window.location='https://bolefast.eddukate.org/home';</script>";
							break;
						case '2':
							print "<script>window.location='https://bolefast.eddukate.org/admin';</script>";
							break;
						default:
							# code...
							break;
					}
				}
			}
		}
	}
}
