<?php

    //incluimos la clase nusoap.php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $cont = $_GET['pass1'];
    
    //creamos el objeto de tipo soapclient.
    //http://www.mydomain.com/server.php se refiere a la url
    //donde se encuentra el servicio SOAP que vamos a utilizar.

    $soapclient = new nusoap_client('https://crescive-discontinu.000webhostapp.com/LabBDAsierCruzElurSalgueira/php/VerifyPassWS.php?wsdl',true);

    //Llamamos la función que habíamos implementado en el Web Service
    //e imprimimos lo que nos devuelve

    if(isset($cont)){

        $result = $soapclient->call('Validar',array('x'=>$cont));

        if($result =="INVALIDA"){
        echo  "<p style='color:red;'> Contraseña No Valida </p>";
        }else if ($result == "VALIDA"){
        echo"<p style='color:green;'> Contraseña Valida </p>";
        }else{
            echo"<p style='color:blue;'> Fuera de Servicio </p>";
        }
    }
?>