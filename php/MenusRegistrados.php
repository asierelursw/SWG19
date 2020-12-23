<?php
include '../php/DbConfig.php';

$link = mysqli_connect($server, $user, $pass, $basededatos);
$sql="SELECT Imagen FROM Usuario WHERE Correo ='". $_SESSION['usuario'] . "';";
$img = mysqli_query($link,$sql);
$img2 = mysqli_fetch_array($img);
$_SESSION['img'] = "";

$_SESSION['img'] = "data:image;base64,". $img2['Imagen'];
echo"
<div id='page-wrap'>
<header class='main' id='h1'>
        <span class='right'><a>".$_SESSION['usuario']."</a>
        <br/>
        <img src='".$_SESSION['img']."' height='90px' width='90px'>
        <br/>
        <span class='right'><a href='LogOut.php'>Logout</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='HandlingQuizesAjax.php'> Insertar/Ver Preguntas</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>";

?>