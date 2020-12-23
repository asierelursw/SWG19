<?php
session_start();

include 'DbConfig.php';

#if (!isset($_SESSION['restablecer']) || !isset($_SESSION['codigo']) || !isset($_POST['user_mail']) || !isset($_POST['Pass1']) || !isset($_POST['Pass2']) || !isset($_POST['Code'])) {
#	echo "<script>alert(\"No vas a cambiar la contraseña de nuestros usuarios...Nos comprometemos con su integridad!\");document.location.href='Layout.php';</script>";
#}

$prof = "/^[a-zA-Z]+(.[a-zA-Z]+@ehu.(eus|es)|@ehu.(eus|es))$/";
$alum = "/^[a-zA-Z]+(([0-9]{3})+@ikasle.ehu.(eus|es))$/";

if (isset($_SESSION['restablecer']) && isset($_SESSION['codigo'])) {
	if (!empty($_POST['user_mail']) && !empty($_POST['pass1']) && !empty($_POST['Pass2']) && !empty($_POST['code'])) {
		if (preg_match($prof, $_POST['user_mail']) || preg_match($alum, $_POST['user_mail'])) {
			if ($_POST['pass1'] == $_POST['Pass2']) {
				if ($_POST['code'] == $_SESSION['codigo']) {
					$link = mysqli_connect($server, $user, $pass, $basededatos);
					$email = $_POST['user_mail'];
					$pass = md5($_POST['pass1']);
					$sql = "UPDATE Usuario SET Pass='$pass' where Correo='" . $email . "';";
					if (!mysqli_query($link, $sql)) {
						die("Error: " . mysqli_error($link));
					}
					echo "<script>alert('Contraseña cambiada correctamente');document.location.href='LogIn.php'</script>";
				} else {
					echo "<script>alert('Codigo Incorrecto');document.location.href='PeticionCambioContrasena.php'</script>";
				}
			} else {
				echo "<script>alert('Las contraseñas no coinciden');document.location.href='PeticionCambioContrasena.php'</script>";
			}
		} else {
			echo "<script>alert('El correo no es valido');document.location.href='PeticionCambioContrasena.php'</script>";
		}
	} else {
		echo "<script>alert('Rellene los campos obligatorios');document.location.href='PeticionCambioContrasena.php'</script>";
	}
}