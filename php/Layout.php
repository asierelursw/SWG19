<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<?php
    if(isset($_SESSION['usuario'])){

      if($_SESSION['usuario']=='admin@ehu.es'){
          include "../php/MenuAdmin.php";
      }elseif($_SESSION['usuario']!='admin@ehu.es'){
          include "../php/MenusRegistrados.php";
      } 
  } else {
      include "../php/Menus.php";
  }
?>
  <section class="main" id="s1">
    <div>

      <h2>Quiz: el juego de las preguntas</h2>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
