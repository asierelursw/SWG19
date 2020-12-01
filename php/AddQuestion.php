<?php 
session_start();
?>
<!DOCTYPE html>
<?xml version="1.0" encoding="ISO-8859-1”
standalone="no“ ?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
</head>
<body>
	<?php
	phpinfo();
    if(isset($_GET['email'])){
        include "../php/MenusRegistrados.php";
    } else {
        include "../php/Menus.php";
    }
  ?>
  
  <section class="main" id="s1">
    <div>
	<?php
	$link = mysqli_connect($server, $user, $pass, $basededatos);

	$user_mail = $_POST['user_mail'];

	$prof = "/^[a-zA-Z]+(.[a-zA-Z]+@ehu.(eus|es)|@ehu.(eus|es))$/";
	$alum = "/^[a-zA-Z]+(([0-9]{3})+@ikasle.ehu.(eus|es))$/";

	$pregunta = $_POST['pregunta'];
	$correcta = $_POST['correcta'];
	$falsa1 = $_POST['falsa1'];
	$falsa2 = $_POST['falsa2'];
	$falsa3 = $_POST['falsa3'];
	$dificultad = $_POST['dificultad'];
	$tema = $_POST['tema'];

	$pregunta = strip_tags($pregunta);
	$correcta = strip_tags($correcta);
	$falsa1 = strip_tags($falsa1);
	$falsa2 = strip_tags($falsa2);
	$falsa3 = strip_tags($falsa3);
	$dificultad = strip_tags($dificultad);
	$tema = strip_tags($tema);

	if(strlen($user_mail)>0 && strlen($pregunta)>0 && strlen($correcta)>0 && strlen($falsa1)>0 && strlen($falsa2)>0 && strlen($falsa3)>0 && strlen($dificultad)>0 && strlen($tema)>0){
		if((preg_match($prof,$user_mail) || preg_match($alum, $user_mail))){
			if(strlen($pregunta)>=10){
				$sql="INSERT INTO Preguntas(Correo, Pregunta, Correcta, Incorrecta1, Incorrecta2, Incorrecta3, Dificultad, Tema) 
				VALUES('$user_mail','$pregunta','$correcta','$falsa1','$falsa2','$falsa3','$dificultad','$tema');";
					$xml=simplexml_load_file("../xml/Questions.xml");
                	#Asi añades hijos al xml
                
                	$assessmentItem = $xml->addChild('assessmentItem');

                	$assessmentItem -> addAttribute('subject', $tema);
                	$assessmentItem -> addAttribute('author', $user_mail);

                	$body = $assessmentItem -> addChild('itemBody');

                	$body -> addChild('p', $pregunta);
                	
                	$correctResponse = $assessmentItem->addChild('correctResponse');
                	$correctResponse->addChild('response', $correcta);
                
                	$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
                
                	$incorrectResponses->addChild('response',$falsa1);
                	$incorrectResponses->addChild('response',$falsa2);
                	$incorrectResponses->addChild('response',$falsa3);
                	
                	$xml->asXML("../xml/Questions.xml");
				if (!mysqli_query($link ,$sql))
				{
				die('Error: ' . mysqli_error());
				}else{
				echo "Pregunta añadida con éxito";
				//echo "<p> <a href='verdatos.php'> Ver registros </a>";
				mysqli_close($link);
				} 
			}else{
					echo "<script>alert(\"La pregunta tiene que tener 10 caracteres minimo\");document.location.href='QuestionForm.php?email=$user_mail';</script>";
				}
		}else{
			echo "<script>alert(\"Introduzca un email valido\");document.location.href='QuestionForm.php?email=$user_mail';</script>";
		}

	}else{
		echo "<script>alert(\"Rellene los campos obligatorios\");document.location.href='QuestionForm.php?email=$user_mail';</script>";
	}
	?>


    </div>
    <?php
    function formatXml($simpleXMLElement){
    	$xmlDocument = new DOMDocument('1.0');
    	$xmlDocument -> preserveWhiteSpace = false;
    	$xmlDocument -> formatOutput = true;
    	$xmlDocument -> loadXML($simpleXMLElement -> asXML());

    	return $xmlDocument ->saveXML();
    }
    ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
