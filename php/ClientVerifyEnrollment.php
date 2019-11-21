<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$soapclient = new nusoap_client( 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);
$error= $soapclient->getError();
if ($error) {	
	echo 'Fallo a la hora de crear cliente: ' . $error ;
}

$resultado = $soapclient->call('comprobar', array('x'=>$_REQUEST['dirCorreo']));
print_r($resultado);

return $resultado;
?>