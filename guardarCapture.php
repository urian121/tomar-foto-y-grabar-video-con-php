<?php
require("config.php");
date_default_timezone_set("America/Bogota");
$dateFile   = date('d-m-Y H:i:s A', time()); 

function getVisitorIp()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ipAdress = $_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ipAdress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ipAdress = $_SERVER['REMOTE_ADDR'];
  }
  return $ipAdress;
}

 $ipUserDesde = getVisitorIp();

 
$payload = json_decode(file_get_contents("php://input"));
if (!$payload) {
    exit("!No se recibió ninguna imagen!");
}

$captura = $payload->captura;
//$by = $payload->by;

// Quitar "data:image..." de la cadena
$capturaLimpia = str_replace("data:image/png;base64,", "", urldecode($captura));

$imagenDecodificada = base64_decode($capturaLimpia);

//Calcular un nombre único
$nombreFoto = uniqid() . ".png";
$nombreImagenGuardada = "fotos/" .$nombreFoto;

if(file_put_contents($nombreImagenGuardada, $imagenDecodificada) ==TRUE){
    $queryInsert  = ("INSERT INTO archivos(desde,nameFile, dateFile) VALUES ('$ipUserDesde','$nombreFoto','$dateFile')");
    $resultInsert = mysqli_query($con, $queryInsert);
}

exit($nombreFoto);
?>
