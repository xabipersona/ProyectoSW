<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

     <h2>Inicio de sesion.</h2>
      
      <div>
         <form action="LogIn.php" name="flogin" id="flogin" method="post" enctype="multipart/form-data">
            <p>Introduce tu dirección de correo: *</p>
            <input type="email" size="60" id="dirCorreo" name="dirCorreo" required >
            <p>Contraseña: *</p>
            <input type="password" size="60" id="pass" name="pass" required>
            <p> <input type="submit" id="submit" value="Enviar"> <input type="reset" value="Limpiar"></p>
        </form>
      </div>
      
    </div>
      
      <div>
        <?php
            if(isset($_REQUEST['dirCorreo'])){
                include 'DbConfig.php';
                
                $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
                if(!$mysqli){
                    die("Fallo al conectar con Mysql: ".mysqli_connect_error());
                }
                $email = $_REQUEST['dirCorreo'];
                $pass = $_REQUEST['pass'];
                
                $sql = "SELECT * FROM usuarios WHERE email=\"".$email."\" and pass=\"".$pass."\";";
                
                $resultado = mysqli_query($mysqli,$sql,MYSQLI_USE_RESULT);
                if(!$resultado){
                    die("Error: ".mysqli_error($mysqli));
                }
                $row = mysqli_fetch_array($resultado);
                if($row['email']==$email){
                   /* sleep(3);
                    header("location:Layout.php?email=".$_REQUEST['dirCorreo']);*/
                    echo "<script>
                    alert('Inicio de sesion realizado correctamente. Pulsa aceptar para acceder a la pantalla principal.');
                    window.location.href='Layout.php?email=".$_REQUEST['dirCorreo']."';
                    </script>";  
                }else{
                    echo "Usuario o contraseña incorrectos, prueba de nuevo. <br>";
                    echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                }
                
            }
    
    
        ?>
      
      </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
