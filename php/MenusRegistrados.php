<?php
	$email= $_GET["email"];

echo"
<div id='page-wrap'>
<header class='main' id='h1'>
        <span class='right'><a href='LogOut.php?email=$email'>Logout</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php?email=$email'>Inicio</a></span>
  <span><a href='QuestionForm.php?email=$email'> Insertar Pregunta</a></span>
  <span><a href='Credits.php?email=$email'>Creditos</a></span>
  <span><a href='ShowQuestions.php?email=$email'>Ver BD</a></span>
</nav>";

?>