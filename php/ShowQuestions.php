<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">
  
    body {
      background-color: green;
    }
    table {
      width: 100%;
      border: 1px solid #000;
    }
    th, td {
      width: 20%;
      text-align: left;
      vertical-align: top;
      border: 1px solid #000;
      border-spacing: 0;
      padding: 0.3em;
      background: #fff;
      color: #000;
    }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

    	<table>
 <?php

include "DbConfig.php";
$mysqli=mysqli_connect($server,$user,$pass,$basededatos);

			if(!$mysqli){
			die("FalloalconectaraMySQL:".mysqli_connect_error());}
		

 echo '<tr><td> Nº Pregunta </td><td> Usuario </td> <td> Pregunta </td> <td> Respuesta Correcta </td> </tr>';

$resultado=mysqli_query($mysqli, "SELECT NumeroPregunta,identificacion,pregunta,correcta FROM Preguntas");
while( $row= mysqli_fetch_array( $resultado)){
echo '<tr><td>' . $row['NumeroPregunta'] . '</td> <td>' . $row['identificacion'] . '</td> <td>' . $row['pregunta'] . '</td>  <td>' . $row['correcta'] . '</td></tr>';
};


?>
</table>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

