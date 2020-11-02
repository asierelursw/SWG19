<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
</head>
<body>
 <?php 
   if(isset($_GET["email"])) { 
        $email = $_GET["email"];
        echo "<script>alert(\"¡Adiós $email!\");document.location.href='Layout.php';</script>"; 
    } else {
        echo "<script>document.location.href='Layout.php';</script>"; 
    }
?>