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
          include "../php/MenuAdmin.php";
  } else {
      include "../php/Menus.php";
  }
?>
  
  <section class="main" id="s1">
    <div>

		<?php 
        if($_SESSION['usuario']=='admin@ehu.es'){
        $link = mysqli_connect($server, $user, $pass, $basededatos);

            $usuarios = mysqli_query( $link,"SELECT * FROM Usuario");
    			   if (!$usuarios){
    				  die('Error: ' . mysqli_error());
    			   }

            echo "<table border=1>";
            echo "<tr><th>Correo</th><th>Contraseña</th><th>Nombre y Apellido</th><th>Tipo de Usuario</th><th>Bloquear/Desbloquear</th><th>BORRAR</th></tr>"; 

        while($row = mysqli_fetch_array($usuarios)){ 
            echo "<tr><td>" . $row['Correo'] . "</td><td>" . $row['Pass'] . "</td><td>" . $row['NomApe'] . "</td><td>" .$row['TipoUsuario']."</td><td>" .$row['BloqueadoDesbloqueado']. "<a href= 'ChangeUserState.php?email=".$row['Correo']."'><input type= 'button' value='Bloquear/Desbloquear'></a></td><td><a href= 'RemoveUser.php?email=".$row['Correo']."'><input type= 'button' value='Borrar'></a></td></tr>";
            //<button id="Bloquear/Desbloquear" name="Bloquear/Desbloquear" onClick='location.href="ChangeUserState.php"'></button>
        }

echo "</table>";
      } else {
        echo"NO PUEDES ACCEDER A ESTA PÁGINA SI NO ERES ADMINISTRADOR";
      }
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
