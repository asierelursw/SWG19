<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
  <style>
      table, th, td { 
                border: 2px black; 
                text-align:center; 
            } 
            th, td { 
                padding: 15px; 
                background-color: white; 
            } 
  </style> 
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
		<?php
			$link = mysqli_connect($server, $user, $pass, $basededatos);
			if (!mysqli_query($link ,$sql))
			{
				die('Error: ' . mysqli_error($link));
			} else {
                $sql = "SELECT * FROM preguntas;";
                $resultado = mysqli_query ($link,$sql);
				
				echo "<table border=1>";
                echo "    <tr><th><b>Autor</b></th><th><b>Enunciado</b></th><th><b>Respuesta</b></th></tr>";
                
                while( $row = mysqli_fetch_array( $resultado)){
                    echo "    <tr><td>".$row['mail']."</td><td>".$row['enunciado']."</td><td>".$row['respuesta_correcta']."</td></tr>";
                }
                
                echo "</table>";
                
                mysqli_close($link);
            }
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
