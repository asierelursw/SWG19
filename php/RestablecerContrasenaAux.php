<?php
session_start();

include 'DbConfig.php';

if (!isset($_SESSION['restablecer']) || !isset($_SESSION['codigo']) || !isset($_REQUEST['user_mail']) || !isset($_REQUEST['Pass']) || !isset($_REQUEST['Pass2']) || !isset($_REQUEST['Code'])) {
	echo "<script>alert(\"No vas a cambiar la contraseña de nuestros usuarios...Nos comprometemos con su integridad!\");document.location.href='Layout.php';</script>";
}

$prof = "/^[a-zA-Z]+(.[a-zA-Z]+@ehu.(eus|es)|@ehu.(eus|es))$/";
$alum = "/^[a-zA-Z]+(([0-9]{3})+@ikasle.ehu.(eus|es))$/";

if (isset($_SESSION['restablecer']) && isset($_SESSION['codigo'])) {
	if (!empty($_REQUEST['user_mail']) && !empty($_REQUEST['Pass']) && !empty($_REQUEST['Pass2']) && !empty($_REQUEST['Code'])) {
		if (preg_match($prof, $_REQUEST['user_mail']) || preg_match($alum, $_REQUEST['user_mail']) {
			if ($_REQUEST['Pass'] == $_REQUEST['Pass2']) {
				if ($_REQUEST['Code'] == $_SESSION['codigo']) {
					$link = mysqli_connect($server, $user, $pass, $basededatos);
					$email = $_REQUEST['user_mail'];
					$pass = crypt($_REQUEST['Pass']);
					$sql = "UPDATE usuarios SET pass='$pass' where email='" . $email . "';";
					if (!mysqli_query($link, $sql)) {
						die("Error: " . mysqli_error($link));
					}
					echo "Correcto";
				} else {
					echo "Codigo incorrecto";
				}
			} else {
				echo "Las contraseñas no coinciden";
			}
		} else {
			echo "El correo no es válido";
		}
	} else {
		echo "Rellene los campos obligatorios";
	}
}