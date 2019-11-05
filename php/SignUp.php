<!DOCTYPE html>
<html>
<head>
    <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
      <h2>Registro de nuevo usuario.</h2>
      
      <div>
         <form action="SignUp.php" name="fregister" id="fregister" method="post" enctype="multipart/form-data">
            <p>Selecciona el tipo de usuario. *</p>
            <select id="tipoUsu" name="tipoUsu">
                <option value="1" selected>Alumno</option>
                <option value="2">Profesor</option>
            </select>
            <p>Introduce tu dirección de correo: *</p>
            <input type="email" size="60" id="dirCorreo" name="dirCorreo" required >
            <p>Introduce tu nombre y apellido(s) *</p>
            <input type="text" size="60" id="nombreApellidos" name="nombreApellidos" required>
            <p>Contraseña: *</p>
            <input type="password" size="60" id="pass" name="pass" required>
            <p>Repite la contraseña: *</p>
            <input type="password" size="60" id="passR" name="passR" required>
            <div id="selector">
            <p>Selecciona una foto de perfil: (Opcional) </p>
            <input type="file" id="file" accept="image/*" name="Imagen">
            </div>
            <p> <input type="submit" id="submit" value="Enviar"> <input type="reset" value="Limpiar"></p>
        </form>
      </div>
      
      <div>
      
        <?php
            if(isset($_REQUEST['dirCorreo'])){
                $regexAlu = "/^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/";
                $regexProf = "/^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/";
                $regexPass = "/^.{6,}$/";
                $regexNombre = "/(\w.+\s).+/";
                
                $resulAlu = preg_match($regexAlu,$_REQUEST['dirCorreo']);
                if(($_REQUEST['tipoUsu']=="1") && $resulAlu){
                    if($_REQUEST['pass']==$_REQUEST['passR']&&preg_match($regexPass,$_REQUEST['pass'])){
                        if(preg_match($regexNombre,$_REQUEST['nombreApellidos'])){
                            introducirNuevoUsuario();
                        }else{
                           echo"Debes introducir tu nombre y al menos un apellido.<br>";
                            echo "<a href=\"javascript:history.back()\">Volver a atras</a>"; 
                        }                       
                    }else{
                        echo" Las contraseñas tienen menos de 6 caracteres o no coinciden.<br>";
                        echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                    }
                }elseif($_REQUEST['tipoUsu']=="2" && preg_match($regexProf,$_REQUEST['dirCorreo'])){
                    if($_REQUEST['pass']==$_REQUEST['passR']&&preg_match($regexPass,$_REQUEST['pass'])){
                        if(preg_match($regexNombre,$_REQUEST['nombreApellidos'])){
                            introducirNuevoUsuario();
                        }else{
                            echo"Debes introducir tu nombre y al menos un apellido.<br>";
                            echo "<a href=\"javascript:history.back()\">Volver a atras</a>"; 
                        } 
                    }else{
                        echo" Las contraseñas tienen menos de 6 caracteres o no coinciden.<br>";
                        echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                    }
                }else{
                    echo" El correo electronico no es correcto o no se corresponde con el usuario seleccionado.<br>";
                    echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                }
            }
            
        function introducirNuevoUsuario(){
            include 'DbConfig.php';
            //Creamos la conexion con la BD.
            $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
            if(!$mysqli)
            {
                die("Fallo al conectar a MySQL: " .mysqli_connect_error());
            }
            
            $tipo = $_REQUEST['tipoUsu'];
            $email = $_REQUEST['dirCorreo'];
            $nombreApellidos = $_REQUEST['nombreApellidos'];
            $pass = $_REQUEST['pass'];
            if($_FILES['Imagen']['name'] == ""){               
                $image = "../images/usuarioAnonimo.jpg";
            }else{
                $image = $_FILES['Imagen']['tmp_name'];             
            }
            
            $contenido_imagen = base64_encode(file_get_contents($image));
            $sql = "INSERT INTO usuarios VALUES ($tipo,'$email','$nombreApellidos','$pass','$contenido_imagen');";
            
             if(!mysqli_query($mysqli,$sql))
            {
                die("Error: " .mysqli_error($mysqli));
            }
            echo "<script>
                    alert('Registro realizado correctamente. Pulsa aceptar para acceder a la pantalla de LogIn.');
                    window.location.href='LogIn.php';
                </script>";        
        }
    
        ?>
      
      
      </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
