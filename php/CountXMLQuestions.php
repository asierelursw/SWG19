<?php

session_start();

if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario'] == "admin@ehu.es") {
        echo "<script>alert(\"RECORDATORIO: El Administrador NO puede añadir preguntas!\");document.location.href='HandlingAccounts.php';</script>";
    } else {
   $xml = simplexml_load_file("../xml/Questions.xml");
   $count = 0;
   $countTot = 0;
   foreach ($xml as $pregunta){
       if ($pregunta["author"] == $_SESSION['usuario']){ $count = $count + 1;}
       $countTot = $countTot + 1;
   }
   echo $countTot." / ".$count;
    }
} else {
    echo "<script>alert(\"RECORDATORIO: Debes hacer login primero!\");document.location.href='Layout.php';</script>";
}

   
?>
