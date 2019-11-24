<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

  $soapclient = new nusoap_client('http://localhost/ProyectoSW/php/ClientVerifyPass.php?wsdl');
  
  if (isset($_GET['contra'])){
    $respuesta = $soapclient->call('compr', array('x'=>$_GET['contra']));
   //echo '<h1>La contraseña introducida es ';
    //echo $_GET['contra'];
    echo $respuesta;
    //echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient->request, ENT_QUOTES) . '</pre>';
   //echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient->response, ENT_QUOTES) . '</pre>';
    //echo '<h2>Debug</h2>';
    //echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
  }
?>