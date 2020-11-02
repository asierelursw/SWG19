<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
	<font face="Comic Sans MS,arial,verdana">
	</font>
  <?php
    if(isset($_GET['email'])){
        include "../php/MenusRegistrados.php";
    } else {
        include "../php/Menus.php";
    }
  ?>
  <section class="main" id="s1">
    <div>

      <h2>DATOS DEL AUTOR/AUTORES</h2>
	  <h1> Hecho por Asier Cruz y Elur Salgueira </h1>
	  <h1> Alumnos de la rama de SoftWare en UPV </h1>
	  <img src="../images/software-design-sketch-name.png"
		width="500"
		height="300"
		title="Logo de grupo de SW de Asier Cruz y Elur Salgueira">
	  <h1> Correo electrónico:<br/><a href = "mailto:acruz024@ikasle.ehu.eus"> acruz024@ikasle.ehu.eus</a> <br/><a href = "mailto:esalgueira001@ikasle.ehu.eus"> esalgueira001@ikasle.ehu.eus </a> </h1>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
