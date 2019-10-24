
<div id='page-wrap'>


<header class='main' id='h1'>
	
  <span class="right" id="login"><a href="SignUp.php">Registro</a></span>
        <span class="right" id="register"><a href="LogIn.php">Login</a></span>
        <span id="bienvenido"> </span>
        <span class="right" id="logout" style="display:none;"><a href="LogOut.php">Logout</a></span>

</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php' id='layout'>Inicio</a></span>
  <span><a href='Credits.php' id='creditos'>Creditos</a></span>
    <span><a href='QuestionForm.php' id='insertar' style="display:none;"> Insertar Pregunta</a></span>
    <span><a href='ShowQuestions.php' id='ver' style="display:none;"> Ver Preguntas</a></span>


</nav>
<?php

if(isset($_GET['correo'])){

	$correo=$_GET['correo'];
	echo "<script src='../js/jquery-3.4.1.min.js'></script>";
	echo "<script> $('#logout').css('display', 'inline');

            $('#login').css('display', 'none');
            $('#register').css('display', 'none');


            $('#insertar').css('display', 'inline');
            $('#ver').css('display', 'inline');

            $('#bienvenido').text('Bienvenido $correo'); </script>";



    echo "<script> 

    $('#layout').attr('href','Layout.php?correo=$correo');
     $('#insertar').attr('href','QuestionForm.php?correo=$correo');
      $('#ver').attr('href','ShowQuestions.php?correo=$correo');
       $('#creditos').attr('href','Credits.php?correo=$correo');

    </script>";

}

?>