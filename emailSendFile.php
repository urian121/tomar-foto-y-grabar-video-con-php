<?php
require("config.php");
    $id_archivo = $_REQUEST['id_archivo'];
    $typeFile   = $_REQUEST['typeFile'];
    $email      = $_REQUEST['email'];
    $archivo    = $_REQUEST['arch'];
    $nameArch   = $_REQUEST['nameArch'];

    if($typeFile =="video"){
        $contenido = 'http://demos.proyectos.webdeveloper.sgbcolombia.com/videos/'.$archivo;
    }else{
        $contenido = 'http://demos.proyectos.webdeveloper.sgbcolombia.com/fotos/'.$archivo;
    }



$queryInsert  = ("INSERT INTO archivospersonas(id_archivo,email) VALUES ('$id_archivo','$email')");
$resultInsert = mysqli_query($con, $queryInsert);

if($resultInsert >0){
$para = $email;
$titulo = "Archivo";
$mensaje = "
<html>
<head>
<title> foto  Video</title>
</head>
    <body>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div style='width: 100%; margin:0 auto; background-color: #ffffff; color: #34495e; text-align: center;font-family: sans-serif'>
            <h2 style='font-size: 16px; color: #34495e; margin: 0 0 7px;'>¡Felicitaciones!  dale click al bot&oacute;n para descargar tu archivo, <strong style='color:#555;'>".$nameArch."</strong>.
            </h2>
            <p>&nbsp;</p>
            <p style='margin:0 auto;'>
            <a href=".$contenido." style='background-color: #fe4c50;border: #fe4c50;color: white;text-decoration: none;padding: 10px 40px;border-radius: 5px;'> Descargar </a>
            </p>
            <p>&nbsp;</p>
        </div>
    </body>
</html>
";

//Cabecera Obligatoria
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:  Claro <noresponder@campainbull.online>' . "\r\n";
$headers .= 'Cc: noresponder@campainbull.online' . "\r\n";

//OPCIONAR
$headers .= "Reply-To: "; 
$headers .= "Return-path:"; 
$headers .= "Cc:"; 
$headers .= "Bcc:"; 

@mail($para, $titulo, $mensaje, $headers);

}

header("Location:./");

?>