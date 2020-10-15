<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<?php
	$link = mysqli_connect("localhost", "root", "", "quiz");
	$sql="INSERT INTO preguntas VALUES'('Correo', 'Pregunta', 'Correcta', 'Incorrecta1', 'Incorrecta2', 'Incorrecta3', 'Dificultad', 'Tema')'
	('$_POST[mail]','$_POST[pregunta]','$_POST[correcta]','$_POST[falsa1]','$_POST[falsa2]','$_POST[falsa3]','$_POST[dificultad]','$_POST[tema]');";
	if (!mysqli_query($link ,$sql))
	{
		die('Error: ' . mysqli_error($link));
	}
	echo "1 record added";
	mysqli_close($link);
	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
