<?php
    $xml = simplexml_load_file("../xml/Questions.xml");
    echo "<table border=1>";
    echo "<tr><th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th><th>Respuestas Incorrecta</th></tr>"; 
    
    foreach($xml as $pregunta){ #Asi recorres todas las preguntas que haya en el xml
		  echo "<tr><td>".$pregunta["author"]."</td><td>".$pregunta->itemBody->p."</td><td>".$pregunta->correctResponse->response."</td><td><li>".$pregunta->incorrectResponses->response[0]."</li><li>".$pregunta->incorrectResponses->response[1]."</li><li>".$pregunta->incorrectResponses->response[2]."</li></td></tr>";            
    }
    echo "</table>";
?>


