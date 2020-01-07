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

  		<p>Introduzca un email con extensión @gmail.com</p>
  		<br>
  	
  		<form action="EnviarEmail.php" name="formemail" id="formemail" method="post" enctype="multipart/form-data">
            <p>Introduce el correo para la recuperación de tu contraseña: *</p>
            <input type="text" size="60" id="cambioemail" name="cambioemail">
            
            <input type="submit" value="Enviar Email">             
        </form>
        <br>

        <p>Puede que reciba el email en su buzón de spam</p>
  <?php include '../html/Footer.html' ?>
</body>
</html>
