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

        Introducir correo:
        <br>
        <input type="email" id="correo" name="correo" required pattern="([a-z]+[0-9]{3}@+(ikasle\.ehu\.eus|ikasle\.ehu\.es))|([a-z]+@+(ehu\.es|ehu\.eus))">
        <br>
        Introducir Contraseña:
        <br>
        <input type="password" id="contraseña" name="contraseña" required>
       <br>

        <input type="submit" id="confirmar" value="Enviar">
    </form>

<?php

        if(isset($_POST['correo'])){

            include "DbConfig.php";
            $mysqli= mysqli_connect($server,$user,$pass,$basededatos);

            if(!$mysqli){
            die("FalloalconectaraMySQL:".mysqli_connect_error());
             }

              
            $correo=$_POST["correo"] ;
            $contraseña=$_POST['contraseña'];;
            


            $consulta="SELECT * FROM usuarios WHERE Email='$correo'";
            
            $resultado=mysqli_query($mysqli ,$consulta);

            $row= mysqli_fetch_array($resultado);

           $contraseña2=$row['Password'];
           $username=$row['Nombre'];

           
           if($contraseña2==$contraseña){
                echo("<script> alert('BIENVENIDO AL SISTEMA: ". $username. "')</script>");
                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = 'QuestionForm.php?correo='.$correo;
                header("Location: http://$host$uri/$extra");
                
           }else{
                  echo 'Nombre de usuario o contraseña incorrecto';
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
