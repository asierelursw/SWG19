<?php
include '../php/DbConfig.php';
$link = mysqli_connect($server, $user, $pass, $basededatos);
$sql="SELECT Imagen FROM Usuario WHERE Usuario.Correo =".$_SESSION['usuario'].";";
$_SESSION['img'] = $sql;


echo"
<div id='page-wrap'>
<header class='main' id='h1'>
        <span class='right'><a>".$_SESSION['usuario']."</a>
        <img src='".base64_decode($sql)."'>
        <span class='right'><a href='LogOut.php'>Logout</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='HandlingQuizesAjax.php'> Insertar/Ver Preguntas</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>";

?>