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
	
        <form id='fLogIn' name='fLogIn'>
        <ul>
			<li>
                <label for="email">Correo:</label>
                <input type="email" id="email" name="user_mail" size="52">
            </li>
			<li>
                <label for="password">Contraseña:</label>
                <input type="text" id="pass" name="pass" size="52">
            </li>
		</ul>
        </form>
        
		<?php 
        $link = mysqli_connect($server, $user, $pass, $basededatos);

        $user_mail = $_REQUEST['user_mail'];
		$pass = $_REQUEST['pass'];

        if(isset($user_mail) && isset($pass)){
			$sql="SELECT Correo, Pass FROM Usuario WHERE Correo=$user_mail;"
			if (!mysqli_query($link ,$sql))
				{
				die('Error: ' . mysqli_error($link));
			}
			if($sql=$user_mail){} //hacer una sentencia en la cual compare el resultado sql con usuario y contraseña
		}