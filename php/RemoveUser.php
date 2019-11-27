<?php

	include "DbConfig.php";

	$link = mysqli_connect($server,$user,$pass,$basededatos);
    
    if(!$link){
    	die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
    }

    $drop = "DELETE FROM usuarios WHERE email='".$_GET['email']."'";

    $resul = mysqli_query($link,$drop);
    
    if($resul == true){

    	echo "<script>alert('Usuario eliminado');</script>";
    
    } else {

    	echo "<script>alert('Usuario NO eliminado');</script>";
    }
    
    mysqli_close($link);

   	echo "<script>window.location.href = 'HandlingAccounts.php'</script>";
?>