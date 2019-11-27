<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php

     	if ($_SESSION["autenticado"] != "SI" || $_SESSION["tipo"]!="admin") {
			//si no existe, envio a la página de autentificación
			header("Location: Layout.php");
			//además salgo de este script
		
			exit();
        
		} else{
        	include 'DbConfig.php';
        	//Creamos la conexion con la BD.
        	$link = mysqli_connect($server,$user,$pass,$basededatos);
        	if(!$link){
            	die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
        	}
        
        	$sql = "SELECT * FROM usuarios;";
        	$resul = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
        	if(!$resul){
            die("Error: ".mysqli_error($link));
        }
        
        echo "<table border = ><tr><th>Email</th><th>Pass</th><th>Imagen</th><th>Estado</th><th>Bloqueo</th><th>Borrar</th></tr>";
        while($row = mysqli_fetch_array($resul)){

            echo "<tr><td>".$row['email']."</td><td>".$row['pass']."</td><td><img width=\"150\" height=\"150\" src=\"data:image/*;base64, ".$row['foto']."\" alt=\"Imagen\"/></td><td>".$row['estado']."</td><td><input value='Cambiar Estado' onClick=state('".$row['email']."') type='button'/></td><td><input value='Eliminar Cuenta' onClick=remove('".$row['email']."') type='button'/></td></tr>";
        }
        echo "</table>";
        mysqli_close($link);
       } 
    ?>
    </div>
  </section>

  <script type="text/javascript">
  	
  	function state(correo){

  		var resul = confirm('¿Estas seguro de que quieres cambiar el estado?');

  		if (resul == true){

  			location.href = 'ChangeState.php?email='+correo;

  		}
  	}

  	function remove(correo){

  		var resul = confirm('¿Estas seguro de que quieres eliminar el usuario '+correo+'?');

  		if (resul == true){

  			location.href = 'RemoveUser.php?email='+correo;

  		}
  	}

  </script>

  <?php include '../html/Footer.html' ?>
</body>
</html>
