<?php
//incluimos la clase nusoap.php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$soapclient = new nusoap_client( 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);

if (true/*isset($_POST['email'])*/){
    $result = $soapclient->call('comprobar',array('x'=>"esalgueira001@ikasle.ehu.eus"));
   if($result =="SI"){
       echo "eres vip lokooo";
   }else{
       echo"eres el puto amo tio no pasa nada";
   }
}
?>
