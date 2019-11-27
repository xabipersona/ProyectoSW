<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

  $soapclient = new nusoap_client('http://localhost/EntregaLabSeguridad/php/ClientVerifyPass.php?wsdl');
  
  if (isset($_GET['contra'])){
    $respuesta = $soapclient->call('compr', array('x'=>$_GET['contra']));
    echo $respuesta;
    
  }
?>