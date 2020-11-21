<?php
    //error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
  <script src='../js/VerifyAjax.js'>
    </script>
</head>
<body>
  <?php include '../php/Menus.php';?>
  
  <section class="main" id="s1">
    <div>
	
        <form id='fSingUp' name='fSingUp' action="" method="Post">
        <ul>
            <li>
                <label for="tusuario"> Tipo de usuario*:</label>
                <input type="radio" id="radio" name="radio" value="Alumno" > Alumno
                <input type="radio" id="radio" name="radio" value="Profesor"> Profesor <br>
            </li>
            <li>
                <label for="email">Correo*:</label>
                <input type="email" id="user_mail" name="user_mail" size="52" onblur="VerificarVip()">
                <br>
                </br>
                <label id="vip" value=""></label>
                <!-- coincidir con las expresiones regulares de la validacion al enviar preguntas -->
            </li>
            <p>
            <br/>
            </p>
            <li>
                <label for="nombre_y_apellidos"> Nombre y Apellidos*:</label> 
                <input type ="text" id="nyp" name="nyp" size="52">
                <!-- minimo 2 palabras -->
            </li>
            <p>
            <br/>
            <p>
            <li>
                <label for="password">Contraseña*:</label>
                <input type="password" id="pass1" name="pass1" size="52" onblur="VarificarPass()">
                <br>
                </br>
                <label id="validpass" value=""></label>
                <!-- minimo longitud 6 -->
            </li>
            <p>
            <br/>
            <p>
            <li>
                <label for="password2">Repita la Contraseña*:</label>
                <input type="password" id="pass2" name="pass2" size="52">
                <!-- pass == pass2 -->
            </li>    
	        <!-- Foto Opcional -->
            <br>
            <input type="submit" name="submit" value="Enviar" id="Enviar" disabled="true">
        </ul>
        </form>
        <?php 
        

        if (isset($_POST["submit"])){
        
        if (isset($_POST["user_mail"])){
            $user_mail = $_POST['user_mail'];
        }else{
            $user_mail = "";
        }
        
        if (isset($_POST["nyp"])){
            $NyP = $_POST['nyp'];
        }else{
            $nyp = "";
        }
        
        if (isset($_POST["pass1"])){
            $pass1 = $_POST['pass1'];
        }else{
            $pass1 = "";
        }

        if (isset($_POST["pass2"])){
            $pass2 = $_POST['pass2'];
        }else{
            $pass2 = "";
        }

        if (isset($_POST["radio"])){
            $radio = $_POST['radio'];
        }else{
            $radio = "";
        }
         
        $prof = "/^[a-zA-Z]+(.[a-zA-Z]+@ehu.(eus|es)|@ehu.(eus|es))$/";
        $alum = "/^[a-zA-Z]+(([0-9]{3})+@ikasle.ehu.(eus|es))$/";

        //$NomApe = explode(" ", $NyP);


            if(isset($user_mail) && isset($NyP) && isset($pass1) && isset($pass2)){
                if(preg_match($prof, $user_mail) || preg_match($alum, $user_mail) ){
                    if($pass1 == $pass2){
                        if(strlen($pass1)>6){
                            if ($NyP == trim($NyP) && strpos($NyP, ' ') !== false){
                                $link = mysqli_connect($server, $user, $pass, $basededatos);
                                $sql="INSERT INTO Usuario(Correo, Pass, NomApe, TipoUsuario) 
                                VALUES('$user_mail','$pass1','$NyP','$radio');";
                                if (!mysqli_query($link ,$sql))
                                {
                                    die('Error: ' . mysqli_error());
                                }else{
                                    mysqli_close($link);
                                    echo "<script>alert(\"¡Registro correcto!\");document.location.href='LogIn.php';</script>";
                                }
                            }else{
                                echo("Introduce un nombre y apellido validos");
                            }
                        }else{
                            echo("La contraseña debe ser de mas de 6 caracteres");
                        }
                    }else{
                        echo("Las contraseñas no coinciden");
                    }
                } else {
                    echo("Introduzca un email valido");
                }
            }else{
                echo("Rellene los campos obligatorios");
            }
        }
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
