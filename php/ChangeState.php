<?php
    session_start();
    if ($_SESSION["autenticado"] != "SI" || $_SESSION["tipo"]!="admin") {
            //si no existe, envio a la página de autentificación
            header("Location: Layout.php");
            //además salgo de este script
        
            exit();        
}

    include "DbConfig.php";

	$link = mysqli_connect($server,$user,$pass,$basededatos);
    
    if(!$link){
    	die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
    }

    $correo = $_GET['email'];

    $estado = "SELECT estado FROM usuarios WHERE email='".$_GET['email']."'";

    $resul = mysqli_query($link,$estado);

    $row = mysqli_fetch_array($resul);

    if ($row['estado'] == 'activo'){
        
    	$sql = "UPDATE usuarios SET estado='bloqueado' WHERE email='".$_GET['email']."'";

	}else {
		
		$sql = "UPDATE usuarios SET estado='activo' WHERE email='".$_GET['email']."'";

	}
    
    if(mysqli_query($link,$sql)){

    	echo "<script>alert('actualizado');</script>";
    } else {

    }
    
    mysqli_close($link);

    echo "<script>window.location.href = 'HandlingAccounts.php'</script>";
?>    