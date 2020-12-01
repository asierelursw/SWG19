<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
</head>
<body>
<?php
    if(isset($_SESSION['usuario'])){
        include "../php/MenusRegistrados.php";
    } else {
        include "../php/Menus.php";
    }
?>
  
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
        $user_mail=strip_tags($user_mail);
        $pass=strip_tags($pass);

          if(isset($user_mail) && isset($pass)){
            $usuarios = mysqli_query( $link,"SELECT * FROM Usuario WHERE Correo ='$user_mail' AND Pass =md5('$pass1')");
            $row = mysqli_fetch_array($usuarios);
            $bloq= $row['BloqueadoDesbloqueado'];
    			   if (!$usuarios){
    				  die('Error: ' . mysqli_error());
    			   }else{
               if($bloq=='Bloqueado'){
                echo "<script>alert(\"¡Estas bloqueado!\");document.location.href='LogIn.php';</script>";
               }else{
    			     $cont= mysqli_num_rows($usuarios); 
                  if($cont==1){
                    $_SESSION["usuario"]= $user_mail;
                    echo "<script>alert(\"¡Bienvenido!\");document.location.href='HandlingQuizesAjax.php';</script>";
                  }else {
                    echo("Parametros de login incorrectos");
                  }
                }
            }
          }else{
            echo("Faltan campos por rellenar");
          }
    }
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
