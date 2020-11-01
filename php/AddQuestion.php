<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
</head>
<body>
  <?php include '../php/Menus.php';?>
  
  <section class="main" id="s1">
    <div>
	<?php
	$link = mysqli_connect($server, $user, $pass, $basededatos);

	$user_mail = $_REQUEST['user_mail'];

	$prof = "/^[a-zA-Z]+(.[a-zA-Z]+@ehu.(eus|es)|@ehu.(eus|es))$/";
	$alum = "/^[a-zA-Z]+(([0-9]{3})+@ikasle.ehu.(eus|es))$/";

	$pregunta = $_REQUEST['pregunta'];
	$correcta = $_REQUEST['correcta'];
	$falsa1 = $_REQUEST['falsa1'];
	$falsa2 = $_REQUEST['falsa2'];
	$falsa3 = $_REQUEST['falsa3'];
	$dificultad = $_REQUEST['dificultad'];
	$tema = $_REQUEST['tema'];

	if(isset($user_mail) && isset($pregunta) && isset($correcta) && isset($falsa1) && isset($falsa2) && isset($falsa3) && isset($dificultad) && isset($tema)){
		if((preg_match($prof,$user_mail) || preg_match($alum, $user_mail)){
			if(strlen($pregunta)>10){
				$sql="INSERT INTO Preguntas(Correo, Pregunta, Correcta, Incorrecta1, Incorrecta2, Incorrecta3, Dificultad, Tema) 
				VALUES('$_REQUEST[user_mail]','$_REQUEST[pregunta]','$_REQUEST[correcta]','$_REQUEST[falsa1]','$_REQUEST[falsa2]','$_REQUEST[falsa3]','$_REQUEST[dificultad]','$_REQUEST[tema]');";
				if (!mysqli_query($link ,$sql))
				{
				die('Error: ' . mysqli_error($link));
				}
				echo "Pregunta añadida con éxito";
				//echo "<p> <a href='verdatos.php'> Ver registros </a>";
				mysqli_close($link);
			}
		} else{
			echo("Introduzca un email valido");
		}

	}else{
		echo("Rellene los campos obligatorios");
	}

	?>

    </div>
	<a href="ShowQuestions.php"> Ver BD </a>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
