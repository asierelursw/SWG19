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
    
        if(!isset($HTTP_RAW_POST_DATA)){

            $HTTP_RAW_POST_DATA = file_get_contents('php://input/../txt/toppasswords.txt');
            
        }

        $passwords = file($HTTP_RAW_POST_DATA);
        
        for($i=0; $i<count($passwords);$i++){
            
            if($x == $passwords[$i]){
                return "INVALIDA";
            }
        }
        return "VALIDA";
    }

    //llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros

    if (!isset($HTTP_RAW_POST_DATA)){
        $HTTP_RAW_POST_DATA =file_get_contents('php://input/../txt/toppasswords.txt');
        
    }

    $server->service($HTTP_RAW_POST_DATA);

?>
