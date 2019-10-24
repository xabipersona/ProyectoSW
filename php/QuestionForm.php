<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      Es obligatorio rellenar todos los campos

    </div>
    <form id="formulario" method="POST" action="AddQuestion.php">
    	Introducir correo:
    	<br>

        <?php 
        $correo=$_GET['correo'];
    	echo "<input type='text' id='correo' name='correo' value='$correo' readonly>";
        ?>

    	<br>
        Inserta pregunta:
        <br>
    	<input type="text" id="pregunta" name="pregunta" required pattern="[A-Za-z0-9_]{10,200}">
    	<br>
    	Respuesta correcta:
    	<br>
    	<input type="text" id="correcta" name="correcta" required>
    	<br> 
    	Respuesta incorrecta 1:
    	<br>
    	<input type="text" id="incorrecta1" name="incorrecta1" required>
    	<br> 
    	Respuesta incorrecta 2:
    	<br>
    	<input type="text" id="incorrecta2" name="incorrecta2" required>
    	<br> 
    	Respuesta incorrecta 3:
    	<br>
    	<input type="text" id="incorrecta3" name="incorrecta3" required>
    	<br>
        Tema:
        <br>
        <input type="text" id="tema" name="tema" required>
        <br>

    	Valora la dificultad de la pregunta:
    	<br>
    	<input type="radio" name="dificultad" value="1"> Baja
    	<input type="radio" name="dificultad" value="2" checked> Media	    			
    	<input type="radio" name="dificultad" value="3"> Alta	    			
    	<br><br>

    	<input type="submit" id="confirmar" value="Enviar">
    </form>


           

    <script src="../js/jquery-3.4.1.min.js"></script>
 <!--   <script src="../js/ValidateFieldsQuestion.js"></script> -->
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
