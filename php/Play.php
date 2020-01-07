<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>

</head>
<body>
  <script type="text/javascript">
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
</script>
  <?php include '../php/Menus.php' ?>

  <p>Seleccione un tema para la pregunta: </p>
  <br>
    <?php
    
      include 'DbConfig.php';

      $link = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$link){
        die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
      }
        
      $sql = "SELECT DISTINCT tema FROM preguntas";
      $resul = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
                  
      if(!$resul){
        die("Error: ".mysqli_error($link));
      }

      $i = 1; 

      echo "<select id='selectTema' name='selectTema' >
      <option value='0' selected>Elige un tema...</option>";

      while($row = mysqli_fetch_array($resul)){
        echo "<option value=".$i.">".$row['tema']."</option>";
        $i++;
      }
      echo "</select>";

    ?>
    <br>
    <div id="selectPregunta" name="selectPregunta"></div>   
  
    <script type="text/javascript">
      $(document).ready(function(){
        //$('#selectTema').val();
        //recargarLista();

        $('#selectTema').change(function(){
          recargarLista();
        });
      })
</script>

<script type="text/javascript">
  function recargarLista(){

    $.ajax({
      type:"POST", 
      url:"PreguntasTema.php",
      data:"tema=" + $('#selectTema').val(),
      success:function(r){
        $('#selectPregunta').html(r);
      }
    });
  }
</script>

  <?php include '../html/Footer.html' ?>
</body>
</html>
