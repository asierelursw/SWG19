<?php
$email = isset($_SESSION['usuario']);
echo"
<div id='page-wrap'>
<header class='main' id='h1'>
        <span class='right'><a>".$email.";</a>
        <img src=$_SESSION['img'];>
        <span class='right'><a href='LogOut.php'>Logout</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='HandlingQuizesAjax.php'> Insertar/Ver Preguntas</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>";

?>