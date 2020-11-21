<?php
//incluimos la clase nusoap.php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$soapclient = new nusoap_client( 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);

if (isset($_GET['email'])){
    $result = $soapclient->call('comprobar',array('x'=>$_GET['email']));
   if($result =="SI"){
       echo "Usuario Vip";
   }else{
       echo"Usuario No Vip";
   }
}
?>
