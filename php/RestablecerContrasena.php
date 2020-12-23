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
</head>

<body>
	<?php if(isset($_SESSION['usuario'])){

if($_SESSION['usuario']=='admin@ehu.es'){
    echo "<script>alert(\"No vas a cambiar la contraseña del admin tán fácilmente...!\");document.location.href='HandlingAccounts.php';</script>";
    include "../php/MenuAdmin.php";
}elseif($_SESSION['usuario']!='admin@ehu.es'){
    
    include "../php/MenusRegistrados.php";
} 
} else {
include "../php/Menus.php";
} ?>
	<section class="main" id="s1">
		<div>
			<form name="fRC" id="fRC" method='POST' action='Email.php'>
            <ul>
                        <center>
                            <li>
                                <label for="mail">Correo* (Se le enviará al correo un mensaje de recuperación):</label></br>
                                <input type="email" id="user_mail" name="user_mail" size="52">
                            </li>
							<input type='button' id='Recuperar' value='Enviar'/>				
			</form>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>