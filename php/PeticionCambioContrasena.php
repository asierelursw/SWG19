<?php
session_start();
?>

<html>

	<head>
		<?php include '../html/Head.html' ?>
	<script src="../js/jquery-3.4.1.min.js">
    </script>
	<script src="../js/VerifyAjax.js">
    </script>
	<script src="../js/CambioContraseña.js">
    </script>
	</head>
	<body>
		<?php include '../php/Menus.php' ?>
		<section class="main" id="s1">
			<div id="div1">
	
				<form name="fpass" id="fpass" method="POST" action="RestablecerContrasenaAux.php">
                
                <li>
                <label for="email">Correo*:</label>
                <input type="email" id="user_mail" name="user_mail" size="52" value="" >
                <br>
                </br>
            </li>
            <li>
                <label for="password">Contraseña*:</label>
                <input type="password" id="pass1" name="pass1" size="52"  onblur="VarificarPass()">
                <br>
                </br>
                <label id="validpass" value=""></label>
            </li>
            <p>
            <br/>
            <p>
            <li>
                <label for="password2">Repita la Contraseña*:</label>
                <input type="password" id="Pass2" name="Pass2" size="52">
            </li>    
			
            <li>
                <label for="code">Introduce el código que le hemos enviado a su email:</label>
                <input type="number" id="code" name="code" size="52">
                <input type='submit' id='submit' value='Cambiar contraseña'>
            </li>    
				</form>
                <?php $codigo = $_SESSION['codigo'];
                 echo "Codigo " . $codigo;
                ?>
	
			</div>
			<div id='feedback'>
				<div>
		</section>
		<?php include '../html/Footer.html' ?>
	
	</body>
	
	</html>