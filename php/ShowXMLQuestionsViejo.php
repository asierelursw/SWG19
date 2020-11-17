<!DOCTYPE html>
<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
  <style>
      table, th, td {		  
                border: 2px black; 
                text-align:center; 
            } 
            th, td { 
                padding: 15px; 
                background-color: white; 
            } 
	table { margin: auto; }
  </style> 
</head>
<body>
  <?php
    if(isset($_GET['email'])){
        include "../php/MenusRegistrados.php";
    } else {
        include "../php/Menus.php";
    }
  ?>
  <section class="main" id="s1">
    <div>
		<?php
        $xml = simplexml_load_file("../xml/Questions.xml");
        echo "<table border=1>";
        echo "<tr><th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th><th>Respuestas Incorrecta</th></tr>"; 
        
        foreach($xml as $pregunta){ #Asi recorres todas las preguntas que haya en el xml
				  echo "<tr><td>".$pregunta["author"]."</td><td>".$pregunta->itemBody->p."</td><td>".$pregunta->correctResponse->response."</td><td><li>".$pregunta->incorrectResponses->response[0]."</li><li>".$pregunta->incorrectResponses->response[1]."</li><li>".$pregunta->incorrectResponses->response[2]."</li></td></tr>";            
        }
        echo "</table>";
		?>
    </div>    
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
