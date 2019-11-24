<?php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    //creamos el objeto de tipo soap_server
    $ns="http://localhost/LabSW/";
    $server = new soap_server();
    $server->configureWSDL('compr',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;
    //registramos la función que vamos a implementar
    $server->register('compr',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);
    //implementamos la función
    function compr($contrasena){
        
        $pagina = file_get_contents("../txt/toppasswords.txt");
        $pos = strpos($pagina, $contrasena);
        if ($pos === false) {
            return 'VALIDA';
        } else {
            return 'INVALIDA';
        }
        return 'VALIDA';
        
    }
    //llamamos al método service de la clase nusoap
    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( "php://input" );
    $server->service($HTTP_RAW_POST_DATA);

?>