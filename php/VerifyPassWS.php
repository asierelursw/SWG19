<?php

    //incluimos la clase nusoap.php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    //creamos el objeto de tipo soap_server

    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('Validar',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;

    //registramos la función que vamos a implementar


    $server->register('Validar',
    array('x'=>'xsd:string'),
    array('z'=>'xsd:string'),
    $ns);

    //implementamos la función

    function Validar ($x){
        
        $archivo = file_get_contents('../txt/toppasswords.txt');
        
        if (strpos($archivo, $x) != false){ //si esta la palabra x en el archivo
            return "INVALIDA";
        }else{
            return "VALIDA";
        }
        
    }

    //llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros

    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
        $server->service($HTTP_RAW_POST_DATA);

?>
