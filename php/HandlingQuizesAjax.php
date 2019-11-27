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
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>
    <script src="../js/ValidateFieldsQuestion.js"></script>
    <script src="../js/ShowQuestionsAjax.js"></script>
    <script src="../js/AddQuestionsAjax.js"></script>

   
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <form action="AddQuestionWithImage.php" name="formquestion" id="formquestion" method="post" enctype="multipart/form-data">
            <p>Introduce tu dirección de correo: *</p>
            <?php
            echo "<input type='text' size='60' id='dirCorreo' name='dirCorreo' value=".$_SESSION['email']." readonly> "?>
            <p>Introduce el enunciado de la pregunta: *</p>
            <input type="text" size="60" id="nombrePregunta" name="nombrePregunta">
            <p>Respuesta correcta: *</p>
            <input type="text" size="60" id="respuestaCorrecta" name="respuestaCorrecta">
            <p>Respuesta incorrecta1: *</p>
            <input type="text" size="60" id="respuestaIncorrecta1" name="respuestaIncorrecta1">
            <p>Respuesta incorrecta2: *</p>
            <input type="text" size="60" id="respuestaIncorrecta2" name="respuestaIncorrecta2">
            <p>Respuesta incorrecta3: *</p>
            <input type="text" size="60" id="respuestaIncorrecta3" name="respuestaIncorrecta3">
            <p>Complejidad de la pregunta: *</p>
            <select id="complejidad" name="complejidad" >
                <option value="1">Baja</option>
                <option value="2" selected>Media</option>
                <option value="3">Alta</option>
            </select>
            <p>Introduce el tema de la pregunta: *</p>
            <input type="text" size="60" id="temaPregunta" name="temaPregunta">
            <!-- <div id="selector">
            <input type="file" id="file" accept="image/*" name="file"> 
            </div> -->


            
            <p> <input type="button" id="Mostrar Preguntas" value="Mostrar Preguntas" onclick="preguntasXml()"> <input type="button" id="Enviar" value="Enviar"> <input type="reset" id="reset" value="reset"></p>

            <div id="resultado"> </div>
            
        </form>


        <script>

            $('#reset').click(function(){
                $('#resultado').html("");
            });

        </script>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
