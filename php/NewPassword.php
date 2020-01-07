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

	<form action="NewPassword.php" name="formcod" id="formcod" method="post" enctype="multipart/form-data">
  		<?php include '../php/Menus.php' ?>
  		<p>Introduce tu codigo de validación: *</p>
  		<input type="text" name="codigo" id="codigo" size="60" required>
  		<p>Introduce la nueva contraseña: *</p>
  		<input type="password" size="60" id="pass" name="pass" required>
  		<p>Repite la contraseña: *</p>
  		<input type="password" size="60" id="passR" name="passR" required>
  		<br>
  		<p> <input type="submit" id="submit" value="Enviar"> </p>
  	</form>

  	<?php

  		if (isset($_REQUEST['pass'])) {
  			include 'DbConfig.php';
  			$mysqli = mysqli_connect($server,$user,$pass,$basededatos);
            if(!$mysqli){
                die("Fallo al conectar a MySQL: " .mysqli_connect_error());
            }
  			$sql = "SELECT codigo FROM usuarios WHERE email=\"".$_SESSION['email']."\"";
  			$result = mysqli_query($mysqli, $sql);
  			$row = mysqli_fetch_array($result);

  			if ($row['codigo'] == $_REQUEST['codigo']){
  				mysqli_close($mysqli);
  				if($_REQUEST['pass']==$_REQUEST['passR']){
  					cambiarContraseña();
  				}else{
                	echo"Las contraseñas no coinciden.<br>";
                	echo "<a href=\"javascript:history.back()\">Volver a atras</a>"; 
            	}
        	} else {
        			echo"El código no es correcto.<br>";
                	echo "<a href=\"javascript:history.back()\">Volver a atras</a>"; 
        	}
  		} 

  		function cambiarContraseña(){

  			include 'DbConfig.php';
            //Creamos la conexion con la BD.
            $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
            if(!$mysqli){
                die("Fallo al conectar a MySQL: " .mysqli_connect_error());
            }
            $password = crypt($_REQUEST['pass'], 'st');

            $sql = "UPDATE usuarios SET pass='$password' WHERE email=\"".$_SESSION['email']."\"";
            if(!mysqli_query($mysqli,$sql))
            {
                die("Error: " .mysqli_error($mysqli));
            }

            mysqli_close($mysqli);
            echo "<script>
                    alert('Contraseña modificada correctamente. Pulsa aceptar para volver a la pantalla de inicio.');
                    window.location.href='Layout.php';
                </script>"; 
        }
  	?>

  <?php include '../html/Footer.html' ?>
</body>
</html>