<?php
session_start();
include 'DbConfig.php';

##echo $_GET['user_mail'];
$user_mail = $_POST['user_mail'];
if (isset($user_mail)) {
    
    $link = mysqli_connect($server, $user, $pass, $basededatos);
    if (!$link) {
        die("Fallo al conectar a MySQL: " . mysqli_connect_error());
    }
    
    $sql = "SELECT Correo FROM Usuario WHERE Correo ='". $user_mail ."';";
    $consulta = mysqli_query($link,$sql);
    ##echo"<script>alert('.$consulta['Email'].')</script>";
    $cont= mysqli_num_rows($consulta); 
    
    if ($cont==1) {
        
        $to = $user_mail;
        $subject = "Restablecer contraseña";

        $codigo = rand(00000001, 99999999);

        $_SESSION['restablecer'] = $user_mail;
        $_SESSION['codigo'] = $codigo;
        echo $codigo;

        $message = "
        <html>
        <body>
        <h3>¿Has olvidado tu contraseña? Para restablecer tu contraseña, sólo tienes que pinchar más abajo:</h3>
        <h2><a href ='https://crescive-discontinu.000webhostapp.com/LabBDAsierCruzElurSalgueira/php/PeticionCambioContraseña.php'>Restablecer Contraseña</a></h2>
        <h3>Al acceder, tendrás que insertar el siguiente código de recuperación:</h3>
        <h2>" . $codigo . "</h2>
        <h3>Si no has realizado esta solicitud, puedes ignorar este mensaje.</h3>
        </body>
        </html>
        ";

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: ' . $to . "\r\n";
        $headers .= 'From: Administration <administration@ikasle.ehu.eus>' . "\r\n";
        mail($to, $subject, $message, $headers);

        echo  "<script>alert('Se ha enviado el Email correctamente');document.location.href='PeticionCambioContrasena.php'</script>";
    } else {
        echo "<script>alert('El correo no está en la BD');document.location.href='RestablecerContrasena.php'</script>";
    }
    mysqli_close($link);
} else {
    echo "<script>alert('Introduce un correo antes de continuar!');document.location.href='RestablecerContrasena.php'</script>";
}

