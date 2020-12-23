<?php

    //incluimos la clase nusoap.php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $cont = $_GET['pass1'];
    
    //creamos el objeto de tipo soapclient.
    //http://www.mydomain.com/server.php se refiere a la url
    //donde se encuentra el servicio SOAP que vamos a utilizar.
    $ticket=1010;
    $soapclient = new nusoap_client('https://crescive-discontinu.000webhostapp.com/LabBDAsierCruzElurSalgueira/php/VerifyPassWS.php?wsdl',true);

    //Llamamos la función que habíamos implementado en el Web Service
    //e imprimimos lo que nos devuelve
    if(isset($cont)){

        $result = $soapclient->call('Validar',array('x'=>$cont,'y'=>$ticket));

        if($result =="INVALIDA"){
        echo "INVALIDA";
        }else if ($result == "VALIDA"){
        echo "VALIDA";
        }else if($result=="Fuera de Servicio"){
            echo"Fuera de Servicio";
        }
    }
?>