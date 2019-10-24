<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

     <form id="formulario" method="POST">
        Tipo de usuario:
        <br>
        <input type="radio" name="tipo" value="alumno" checked> Alumno
        <input type="radio" name="tipo" value="profesor" > Profesor  
        <br>
        Introducir correo:
        <br>
        <input type="email" id="correo" name="correo" required pattern="([a-z]+[0-9]{3}@+(ikasle\.ehu\.eus|ikasle\.ehu\.es))|([a-z]+@+(ehu\.es|ehu\.eus))">
        <br>
        Introducir Nombre y Apellidos:
        <br>
        <input type="text" id="nombre" name="nombre" required pattern="[a-zA-Zñá-ú]+[ ]+[a-zA-Zñá-ú]{2,}([ ]+[a-zA-Zñá-ú]{2,}){0,}">
        <br>
        Introducir Contraseña:
        <br>
        <input type="password" id="contraseña" name="contraseña" required>
        <br>
        Repetir Contraseña:
        <br>
        <input type="password" id="contraseña2" name="contraseña2" required>
        <br> 

        <input type="submit" id="confirmar" value="Enviar">
    </form>

<?php

        if(isset($_POST['correo'])){

            $password=$_POST['contraseña'];
            $password2=$_POST['contraseña2'];
            if(strlen($password)<6){
                echo "La contraseña debe tener al menos 6 caracteres";
            }else if($password!=$password2){
                echo "Las contraseñas no coinciden";
            }
            else{ 

                include "DbConfig.php";
                $mysqli= mysqli_connect($server,$user,$pass,$basededatos);
                if(!$mysqli){
                die("FalloalconectaraMySQL:".mysqli_connect_error());
                }
                echo 'ConnectionOK <br>';
              
            $correo=$_POST["correo"] ;
            $nombre=$_POST["nombre"];
            $tipo=$_POST["tipo"];
            


            $insertar="INSERT INTO usuarios VALUES('$correo','$tipo', '$nombre', '$password', '0')";

            if (!mysqli_query($mysqli ,$insertar)){
                die('Error: ' . mysqli_error($mysqli));
            }

            echo 'Registrado correctamente';

            }
        }
       


?>
     

    </div>
   
      

    <script src="../js/jquery-3.4.1.min.js"></script>
 <!--   <script src="../js/ValidateFieldsQuestion.js"></script> -->
  </section>
  <?php include '../html/Footer.html' ?>

</body>
</html>
