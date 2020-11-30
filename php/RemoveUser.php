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
    }
?>
        
		<?php 
        
      if (isset($_GET['email'])){
          $user_mail = $_GET['email'];
          $link = mysqli_connect($server, $user, $pass, $basededatos);
        if($user_mail!='admin@ehu.es'){
              mysqli_query( $link,"DELETE FROM Usuario WHERE Correo ='$user_mail'");   
              echo "<script>alert(\"¡Usuario Borrado correctamente!\");document.location.href='HandlingAccounts.php';</script>";     
              }else{
              echo"NO PUEDES MODIFICAR LOS DERECHOS DEL ADMINISTRADOR";
            }
      }
        

    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
