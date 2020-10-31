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
                <input type="radio" id="talum" name="talum" value="Alumno"> Alumno <br>
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
                <input type="text" id="pass" name="pass" size="52">
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

    </div>
	<a href="ShowQuestions.php"> Ver BD </a>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
