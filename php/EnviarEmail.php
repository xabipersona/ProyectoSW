<?php 
session_start();
if ($_SESSION["autenticado"] != "SI" || $_SESSION["tipo"]!="normal") {
            //si no existe, envio a la página de autentificación
            header("Location: Layout.php");
            //además salgo de este script
        
            exit();        
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php

    include 'DbConfig.php';

    if (isset($_REQUEST['cambioemail'])){

      $to = $_REQUEST['cambioemail'];
      $subject = "Recuperación de contraseña";
      $codigo = rand(00000,99999);

      $_SESSION['code'] = $codigo;

      $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$mysqli){
        die("Fallo al conectar a MySQL: " .mysqli_connect_error());
      }

      $sql = "UPDATE usuarios SET codigo='".$codigo."' WHERE email='".$_SESSION['email']."';";

      if(!mysqli_query($mysqli,$sql)){
        die("Error: " .mysqli_error($mysqli));
      }

      $message = "
      <html>
      <head>
      <title>Recuperación de contraseña</title>
      </head>
      <body>
      <h3>Sigue los siguientes pasos para recuperar la contraseña:</h3>
      <ol>
        <li>Accede al <a href='' id='layout'>link</a></li>
        <li>Escribe tu nueva contraseña en el formulario que te aparecerá (tendrás que escribirla 2 veces)</li>
        <li>Escribe este código en su lugar: ".$codigo."</li>
        <li>Si todo ha ido correctamente se te notificará</li>
      </ol>
      <h4>¡YA PUEDES SEGUIR JUGANDO!</h4>
      </body>
      </html>";

      $headers =  'MIME-Version: 1.0' . "\r\n"; 
      $headers .= 'From: Your name <info@address.com>' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      mail($to, $subject, $message, $headers);

      //include '../php/phpmailer/index.php';
      //phpmailer($to, $subject, $message);

      echo "<script>
            alert('Ahora tu nuevo código es: ".$codigo." Pulsa aceptar y usalo en la siguiente pantalla.');
            window.location.href='NewPassword.php';
            </script>";

    } else {
      echo "Se ha producido un error en el envio.";
    }
  ?>
  <?php include '../html/Footer.html' ?>
</body>
</html>
