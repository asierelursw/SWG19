
<?php
include '../php/DbConfig.php';
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

if(strlen($user_mail)>0 && strlen($pregunta)>0 && strlen($correcta)>0 && strlen($falsa1)>0 && strlen($falsa2)>0 && strlen($falsa3)>0 && strlen($dificultad)>0 && strlen($tema)>0){
	if((preg_match($prof,$user_mail) || preg_match($alum, $user_mail))){
		if(strlen($pregunta)>=10){
			$sql="INSERT INTO Preguntas(Correo, Pregunta, Correcta, Incorrecta1, Incorrecta2, Incorrecta3, Dificultad, Tema) 
			VALUES('$user_mail','$pregunta','$correcta','$falsa1','$falsa2','$falsa3','$dificultad','$tema');";
				$xml=simplexml_load_file("../xml/Questions.xml");
            
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

<?php
function formatXml($simpleXMLElement){
	$xmlDocument = new DOMDocument('1.0');
	$xmlDocument -> preserveWhiteSpace = false;
	$xmlDocument -> formatOutput = true;
	$xmlDocument -> loadXML($simpleXMLElement -> asXML());

	return $xmlDocument ->saveXML();
}
?>

