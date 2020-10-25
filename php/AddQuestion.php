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
	$sql="INSERT INTO Preguntas(Correo, Pregunta, Correcta, Incorrecta1, Incorrecta2, Incorrecta3, Dificultad, Tema) VALUES('$_REQUEST[user_mail]','$_REQUEST[pregunta]','$_REQUEST[correcta]','$_REQUEST[falsa1]','$_REQUEST[falsa2]','$_REQUEST[falsa3]','$_REQUEST[dificultad]','$_REQUEST[tema]');";
	if (!mysqli_query($link ,$sql))
	{
		die('Error: ' . mysqli_error($link));
	}
	echo "1 record added";
	//echo "<p> <a href='verdatos.php'> Ver registros </a>";
	mysqli_close($link);
	?>
    </div>
	<a href="ShowQuestions.php"> Ver BD </a>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
