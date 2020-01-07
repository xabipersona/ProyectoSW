<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<!--<script type="text/javascript">
	function comprobar(){
		alert('entra');
		var e = document.getElementById('selectPregunta');
		var seleccionado = e.options[e.selectedIndex].value;

		alert(seleccionado);
				var correcta=document.getElementById('<?
			echo $row2['respuestac'];?>').value;
		alert(correcta);
		if(seleccionado==correcta){
			alert('correcto');
		}else{
			alert('incorrecta');
		}
	}
</script>-->


<?php
    include 'DbConfig.php';


	$mysqli = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$mysqli){
        die("Fallo al conectar a MySQL: " .mysqli_connect_error());
      }

    $sql = "SELECT DISTINCT tema FROM preguntas";
    $resul = mysqli_query($mysqli,$sql,MYSQLI_USE_RESULT);
                  
    if(!$resul){
      die("Error: ".mysqli_error($mysqli));
    }

    $i = 0;	
    $indice=$_POST['tema'];
    $tema;

    while ($row = mysqli_fetch_array($resul)) {
    	
    	if ($i < $indice){
    		$tema = $row['tema'];	
    		$i++;
    	}
    }

    $mysqli2 = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$mysqli2){
        die("Fallo al conectar a MySQL: " .mysqli_connect_error());
      }

	$sqlaux="SELECT * 
		FROM preguntas 
		WHERE tema=\"".$tema."\";";


	$result=mysqli_query($mysqli2,$sqlaux,MYSQLI_USE_RESULT);

	if(!$result){
      die("Error: ".mysqli_error($mysqli2));
    }

	echo "<br>";

	$row2=mysqli_fetch_array($result);

	echo "<label>".$row2['enunciado']."</label>";
	echo "<br>";		
	echo "Selecciona una respuesta y pulsa CORREGIR";
	echo "<br>";
	echo '<div id="respuestacorrecta" value="'.$row2['respuestac'].'"></div>';
	echo "<select id='selectPregunta' name='selectPregunta'>
			<option value=respuestai2>".$row2['respuestai2']."</option>
        	<option value=respuestai1>".$row2['respuestai1']."</option>
        	<option name='correcta' value='".$row2['respuestac']."'>".$row2['respuestac']."</option>
        	<option value=respuestai3>".$row2['respuestai3']."</option>
        </select>";
				
	echo "<br>";
?>
	<br>
	<p>
	<button type="button" onclick='comprobar()' id="boton">Corregir</button>
	</p>
	<br>
</body>
</html>