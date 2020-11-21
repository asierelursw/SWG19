<?php

    //incluimos la clase nusoap.php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    //creamos el objeto de tipo soapclient.
    //http://www.mydomain.com/server.php se refiere a la url
    //donde se encuentra el servicio SOAP que vamos a utilizar.

    $soapclient = new nusoap_client('../VerifyPassWS.php',true);

    //Llamamos la función que habíamos implementado en el Web Service
    //e imprimimos lo que nos devuelve

    if(isset($_GET['pass1'])){

        $result = $soapclient->call('Validar',array('x'=>$_GET['pass1']));

        if($result =="INVALIDA"){
        echo  "<p style='color:red;'> Contraseña No Valida </p>";
        }else if ($result == "VALIDA"){
        echo"<p style='color:green;'> Contraseña Valida </p>";
        }else{
            echo"<p style='color:blue;'> Fuera de Servicio </p>";
        }
    }
?>