<?php
    // Ruta del modulo
    $destino = "../documents/";
    include "../config/config.php";

    $archivo = $destino . basename($_FILES["files"]["name"]);

    $extension_archivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    $verificar_documento = ($_FILES["files"]["tmp_name"]);

    if($verificar_documento != false) {
        session_start();
        $size = $_FILES["files"]["size"];

        if($size > 1073741824) {
            echo "<script>alert('El archivo tiene que ser menor a 500kbs');window.location='https://bolefast.eddukate.org/admin';</script>";
        } else {

            if($extension_archivo == "doc"
        || $extension_archivo == "pdf"
        || $extension_archivo == "docm"
        || $extension_archivo == "docx"
        || $extension_archivo == "dot"
        || $extension_archivo == "png"
        || $extension_archivo == "jpg"
        || $extension_archivo == "jpge"
        || $extension_archivo == "dotm")
        {
                // Si se valido el archivo
                if(move_uploaded_file($_FILES["files"]["tmp_name"],$archivo)){
                   
                        if(!empty($archivo)){
                            if(isset($archivo)){
                                if($archivo){

                                    $sql_db_user = "SELECT * from usuarios WHERE id = '$_SESSION[user_id]'";

                                    $result = mysqli_query($con, $sql_db_user);
        
                                    while ($admin = mysqli_fetch_array($result)) {
                                
                                        $sql = "INSERT INTO boletines(num_cedula,boletin,trimestre,colegio,fecha_add)
                                            VALUES ('$_POST[cedula]','$archivo','$_POST[trimestre]','$admin[colegio]',NOW())";
                                    }


                                    $query = $con->query($sql);
                                    if($query!=null){
                                        echo "<script>alert('Ha enviado el boletín correctamente');window.location='https://bolefast.eddukate.org/admin';</script>";

                                    }
                                }
                            }
                        }
                
                } else {
                    echo "<script>alert('Parece que hubo un problema, vuelve a intentar :) ');window.location='https://bolefast.eddukate.org/admin';</script>";
                }
            }else {
                echo "<script>alert('Solo se admiten estos tipos de archivos: DOCX, DOCM, DOTX, DOTM, DOC, DOT y PDF');window.location='https://bolefast.eddukate.org/admin';</script>";
            }
        }
    } else {
        echo "<script>alert('Se necesita un documento para poder subirlo. Vuelve a intentarlo.');window.location='https://bolefast.eddukate.org/admin';</script>";
    }