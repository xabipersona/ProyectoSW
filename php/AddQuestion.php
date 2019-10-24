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


 
        if(isset($_POST['correo'])){

        $validacion = "/([a-z]+[0-9]{3}@+(ikasle\.ehu\.eus|ikasle\.ehu\.es))|([a-z]+@+ehu\.es|ehu\.eus)/";

        preg_match($validacion, $_POST['correo'], $matches, PREG_OFFSET_CAPTURE);
       
        if($matches==null){
            echo 'Correo no válido<br>';
             echo "<a href='javascript:history.back()'> volver atrás </a>";

        }
        else{
            include "DbConfig.php";
            $mysqli= mysqli_connect($server,$user,$pass,$basededatos);
            if(!$mysqli){
            die("FalloalconectaraMySQL:".mysqli_connect_error());
            }
            echo 'ConnectionOK <br>';


            $correo=$_POST["correo"] ;
            $pregunta=$_POST["pregunta"];
            $correcta=$_POST["correcta"];
            $incorrecta1=$_POST["incorrecta1"];
            $incorrecta2=$_POST["incorrecta2"];
            $incorrecta3=$_POST["incorrecta3"];
            $tema=$_POST["tema"];
            $dificultad=$_POST["dificultad"];
            


            $consulta = mysqli_query($mysqli ,"SELECT * from Preguntas;");
            $num=mysqli_num_rows($consulta) + 1;            

            $insertar="INSERT INTO Preguntas VALUES('$num','$correo', '$pregunta', '$correcta', '$incorrecta1', '$incorrecta2', '$incorrecta3', '$dificultad', '$tema')";

            if (!mysqli_query($mysqli ,$insertar)){
                die('Error: ' . mysqli_error($mysqli));
            }

            echo "Pregunta insertada correctamente <br>"; 
             echo "<a href='ShowQuestions.php'> Ver preguntas </a>";

           
            }
        }
                   ?>
        

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
