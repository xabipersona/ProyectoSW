<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<?php
    include 'DbConfig.php';

    $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$mysqli){
        die("Fallo al conectar a MySQL: " .mysqli_connect_error());
      }

    
?>
	<input type="button" name="Corregir">
</body>
</html>