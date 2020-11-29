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
        
      if (isset($_POST['user_mail'])){
          $user_mail = $_POST['user_mail'];
      }else{
          $user_mail = '';
      }
        $link = mysqli_connect($server, $user, $pass, $basededatos);
        if($user_mail!='admin@ehu.es'){
            $usuarios = mysqli_query( $link,"SELECT * FROM Usuario WHERE Correo ='$user_mail'");
            $row = mysql_fetch_array($usuarios);
            $bloq= $row[4];
    			   if (!$usuarios){
    				  die('Error: ' . mysqli_error());
    			   }elseif ($bloq='Desbloqueado') {
              mysqli_query( $link,"ALTER TABLE UPDATE Usuario SET Bloqueado/Desbloqueado = 'Bloqueado' WHERE Correo ='$user_mail'");
              echo "<script>alert(\"¡Usuario Bloqueado correctamente!\");document.location.href='HandlingAccounts.php';</script>";   
             }elseif($bloq='Bloqueado'){
                //mysqli_query( $link,"DELETE FROM Usuario WHERE Correo ='$user_mail'");
                mysqli_query( $link,"ALTER TABLE UPDATE Usuario SET Bloqueado/Desbloqueado = 'Desbloqueado' WHERE Correo ='$user_mail'");
              echo "<script>alert(\"¡Usuario Desbloqueado correctamente!\");document.location.href='HandlingAccounts.php';</script>";     
              }
            }else{
              echo"NO PUEDES MODIFICAR LOS DERECHOS DEL ADMINISTRADOR";
            }

    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
