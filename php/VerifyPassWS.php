 <?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
$soapclient = new nusoap_client('http://localhost:80/LABWS/LABWS/php/ClientVerifyPass.php?wsdl',true);
$resultado = $soapclient->call('contrasena', array('x'=>$_REQUEST['contra'],'y'=>$_REQUEST['ticket']));
echo $resultado;
?>