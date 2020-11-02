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
	
      <form id='fLogIn' name='fLogIn' action = "" method="Post">
        <ul>
			       <li>
                <label for="email">Correo:</label>
                <input type="email" id="email" name="user_mail" size="52">
            </li>
			       <li>
                <label for="password">Contraseña:</label>
                <input type="password" id="pass" name="pass" size="52">
            </li>
		    </ul>
        <input type="submit" name="submit" value="Enviar" id="Enviar">
      </form>
        
		<?php 

    if (isset($_POST["submit"])){
        
        if (isset($_POST["user_mail"])){
            $user_mail = $_POST['user_mail'];
        }else{
            $user_mail = "";
        }

        if (isset($_POST["pass"])){
            $pass1 = $_POST['pass'];
        }else{
            $pass1 = "";
        }
        
        $link = mysqli_connect($server, $user, $pass, $basededatos);

          if(isset($user_mail) && isset($pass)){
            $usuarios = mysqli_query( $link,"SELECT * FROM Usuario WHERE Correo ='$user_mail' AND Pass ='$pass1'");
    			   if (!$usuarios){
    				  die('Error: ' . mysqli_error());
    			   }else{
    			     $cont= mysqli_num_rows($usuarios); 
              if($cont==1){
                echo "<script>alert(\"¡Bienvenido!\");document.location.href='Layout.php?email=$user_mail';</script>";
              } 
              else {
               echo("Parametros de login incorrectos");
              }
            }
          }else{
            echo("Faltan campos por rellenar");
          }
    } #29
    ?>
    </div>
    
  <a href="QuestionForm.php"> Añadir pregunta </a>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>