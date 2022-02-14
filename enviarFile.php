<!DOCTYPE html>
<html lang="es">
  <head><meta charset="gb18030">
     
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Claro - Photo & video</title>
    <link type="text/css" rel="shortcut icon" href="assets/images/favicon.ico"/>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
  </head>
<body>

<br><br>
<br><br>
<?php
require("config.php");
if(isset($_REQUEST['video'])){ 
  $varNameFile = $_REQUEST['video']; 
  $titulo ="Enviar mi v&iacute;deo";
  $typeFile ="video";
}else{
  $varNameFile = $_REQUEST['foto']; 
  $titulo ="Enviar mi foto";
  $typeFile ="foto";
 }
 

 //BUSCANDO EL ID DEL ARCHIVO
  $sqlId = ("SELECT * FROM archivos WHERE nameFile='$varNameFile' LIMIT 1 ");
  $queryId = mysqli_query($con, $sqlId);
  $dataId  = mysqli_fetch_array($queryId);
  $idFile = $dataId['id'];
?>
  <div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
    </div>
    <div class="col-md-auto">
        <div class="section-heading">
          <h2 class="text-center"><?php echo $titulo; ?></h2>
          <form id="contact" action="emailSendFile.php" method="POST">
            <input  type="text" name="id_archivo" value="<?php echo $idFile; ?>" hidden>
            <input  type="text" name="arch" value="<?php echo $varNameFile; ?>" hidden>
            <input  type="text" name="typeFile" value="<?php echo $typeFile; ?>" hidden>
            <div class="row">
              <div class="col-md-12">
                <fieldset>
                  <input type="text" name="nameArch" placeholder="Nombre del Archivo" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <input type="email" name="email" placeholder="Correo electrónico" required="true">
                </fieldset>
              </div>
              <div class="col-md-12 mb-3">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button">Enviar ahora</button>
                </fieldset>
              </div>
            </div>
          </form> 
      </div>
    </div>
    <div class="col col-lg-2">
     
    </div>

   
    </div>
    </div>


</body>
</html>