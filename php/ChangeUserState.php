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
          $sql1= "SELECT * FROM Usuario WHERE Correo ='$user_mail'";
            $usuarios = mysqli_query( $link, $sql1);
            $row = mysqli_fetch_array($usuarios);
            $bloq= $row['BloqueadoDesbloqueado'];
    			   if ($bloq=='Desbloqueado') {
               $sql ="UPDATE Usuario SET BloqueadoDesbloqueado = 'Bloqueado' WHERE Correo ='$user_mail'";
              mysqli_query( $link,$sql);
              echo "<script>alert(\"¡Usuario Bloqueado correctamente!\");document.location.href='HandlingAccounts.php';</script>";   
             }else{
                //mysqli_query( $link,"DELETE FROM Usuario WHERE Correo ='$user_mail'");
                mysqli_query( $link,"UPDATE Usuario SET BloqueadoDesbloqueado = 'Desbloqueado' WHERE Correo ='$user_mail'");
              echo "<script>alert(\"¡Usuario Desbloqueado correctamente!\");document.location.href='HandlingAccounts.php';</script>";     
              }
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
