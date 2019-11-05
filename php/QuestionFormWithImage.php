<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>
    <script src="../js/ValidateFieldsQuestion.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <form action="AddQuestionWithImage.php" name="fquestion" id="fquestion" method="post" enctype="multipart/form-data">
            <p>Introduce tu dirección de correo: *</p>
            <input type="text" size="60" id="dirCorreo" name="Direccion Correo Electronico">
            <p>Introduce el enunciado de la pregunta: *</p>
            <input type="text" size="60" id="nombrePregunta" name="Enunciado Pregunta">
            <p>Respuesta correcta: *</p>
            <input type="text" size="60" id="respuestaCorrecta" name="Respuesta Correcta">
            <p>Respuesta incorrecta1: *</p>
            <input type="text" size="60" id="respuestaIncorrecta1" name="Respuesta Incorrecta 1">
            <p>Respuesta incorrecta2: *</p>
            <input type="text" size="60" id="respuestaIncorrecta2" name="Respuesta Incorrecta 2">
            <p>Respuesta incorrecta3: *</p>
            <input type="text" size="60" id="respuestaIncorrecta3" name="Respuesta Incorrecta 3">
            <p>Complejidad de la pregunta: *</p>
            <select id="complejidad" >
                <option value="baja">Baja</option>
                <option value="media" selected>Media</option>
                <option value="alta">Alta</option>
            </select>
            <p>Introduce el tema de la pregunta: *</p>
            <input type="text" size="60" id="temaPregunta" name="Tema de la Pregunta">
            <div id="selector">
            <input type="file" id="file" accept="image/*" name="Imagen">
            </div>

            
            <p> <input type="submit" id="submit" value="Enviar"> <input type="reset" value="Limpiar"></p>
        </form>
        
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
