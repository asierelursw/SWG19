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
	
        <form id='fSingUp' name='fSingUp'>
        <ul>
            <li>
                <label for="tusuario"> Tipo de usuario*:</label>
                <input type="radio" id="talum" name="talum" value="Alumno" > Alumno <br>
                <input type="radio" id="tprof" name="tprof" value="Profesor"> Profesor <br>
            </li>
            <li>
                <label for="email">Correo*:</label>
                <input type="email" id="email" name="user_mail" size="52">
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
                <input type="text" id="pass1" name="pass1" size="52">
                <!-- minimo longitud 6 -->
            </li>
            <p>
            <br/>
            <p>
            <li>
                <label for="password2">Repita la Contraseña*:</label>
                <input type="text" id="pass2" name="pass2" size="52">
                <!-- pass == pass2 -->
            </li>    
	        <!-- Foto Opcional -->
        </ul>
        </form>
        <?php 
        $link = mysqli_connect($server, $user, $pass, $basededatos);

        $user_mail = $_REQUEST['user_mail'];

        $prof = "/^[a-zA-Z]+(.[a-zA-Z]+@ehu.(eus|es)|@ehu.(eus|es))$/";
        $alum = "/^[a-zA-Z]+(([0-9]{3})+@ikasle.ehu.(eus|es))$/";
        
        $NyP = $_REQUEST['nyp'];
        $NomApe = explode(" ", $NyP);

        $pass1 = $_REQUEST['pass1'];
        $pass2 = $_REQUEST['pass2'];

        if(isset($user_mail) && isset($NyP) && isset($pass1) && isset($pass2)){
            if(preg_match($prof, $user_mail) || preg_match($alum, $user_mail) ){
                if($pass1 == $pass2){
                    if(strlen($pass1)>6){
                        if($NomApe.sizeof()>1){
                            $sql="INSERT INTO Usuario(Correo, Pass, NomApe) 
                            VALUES('$_REQUEST[user_mail]','$_REQUEST[pass1]','$_REQUEST[nyp]'";
                            if (!mysqli_query($link ,$sql))
                            {
                            die('Error: ' . mysqli_error($link));
                            }
                            echo "1 record added";
                            mysqli_close($link);
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
        ?>
    </div>
	<a href="ShowQuestions.php"> Ver BD </a>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
