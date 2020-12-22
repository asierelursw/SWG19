<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html'?>
    <script src='../js/ValidateFieldsQuestion.js'>
    </script>
    <script src='../js/jquery-3.4.1.min.js'>
    </script>
    <script src='../js/AddQuestionAjax.js'>
    </script>
    <script src='../js/ShowQuestionsAjax.js'>
    </script>
    <script src="../js/CountQuestionsAjax.js">
    </script>
    <style>
        #div1 {
            margin: auto;
            overflow: scroll;
            height: 100%;
            width: 100%;
        }
        
        * {
            margin: auto;
        }
    </style>
</head>

<body>
<?php

    if(isset($_SESSION['usuario'])){

        if($_SESSION['usuario']=='admin@ehu.es'){
            echo "<script>alert(\"RECORDATORIO: El Administrador NO puede añadir preguntas!\");document.location.href='HandlingAccounts.php';</script>";
            include "../php/MenuAdmin.php";
        }elseif($_SESSION['usuario']!='admin@ehu.es'){
            
            include "../php/MenusRegistrados.php";
        } 
    } else {
        include "../php/Menus.php";
    }
?>
        <section class="main" id="s1">
            <div id="div1">
                <form id='fquestion' name='fquestion' method="POST">
                    <ul>
                        <center>
                            <li>
                                <label for="mail">Correo*:</label>
                                <input type="email" id="mail" name="user_mail" value="<?php echo $_SESSION['usuario']; ?>" size="52" readonly>
                            </li>
                            <p>
                                <br />
                            </p>
                            <li>
                                <label for="pregunta">Pregunta*:</label>
                                <input type="text" id="pregunta" name="pregunta" size="50">
                            </li>
                            <p>
                                <br />
                            </p>
                            <li>
                                <label for="respuesta">Respuesta correcta*:
                <br/>
              </label>
                                <input type="textarea" id="correcta" name="correcta" size="62"> </textarea>
                            </li>
                            <p>
                                <br />
                            </p>
                            <li>
                                <label for="respuesta">Respuesta incorrecta*:
                <br />
              </label>
                                <input type="textarea" id="falsa1" name="falsa1" size="62"> </textarea>
                            </li>
                            <p>
                                <br />
                            </p>
                            <li>
                                <label for="respuesta">Respuesta incorrecta*:
                <br />
              </label>
                                <input type="textarea" id="falsa2" name="falsa2" size="62"> </textarea>
                            </li>
                            <p>
                                <br />
                            </p>
                            <li>
                                <label for="respuesta">Respuesta incorrecta*:
                <br />
              </label>
                                <input type="textarea" id="falsa3" name="falsa3" size="62"></textarea>
                            </li>
                            <p>
                                <br />
                            </p>
                            <li>
                                <label for="dificultad"> Dificultad de la pregunta:</label>
                                <select name="dificultad">

                <option>Facil</option>

                <option>Medio</option>

                <option>Dificil</option>
            </li>
            <p>
              <br />
            </p>
            <p>
              <input type="reset" value="BORRAR" onclick="Borrar()">
            </p>
            <li>
              <label for="respuesta">Tema*:
                <br />
              </label>
              <input type="textarea" id="tema" name="tema" size="62"></textarea>
            </li>
            </select>
                    </ul>

                    <p>
                        <br />
                    </p>
                    <input type="button" value="Enviar" id="Enviar" style="height:20px; width:300px" onclick="AñadirPregunta()">
                    <p>
                        <br />
                    </p>

                </form>
                <input type="button" value="Mostrar Preguntas" id="Mostrar" style="height:20px; width:300px" onclick="VerPreguntas()">
                <div id="result"></div>
                <div id="contadores">
                <h4>TOTAL PREGUNTAS / TUS PREGUNTAS</h4>
                <div id="contPreguntas"></div>
            </div>
            <div id="res"></div>
                </center>
        </section>

        <?php include '../html/Footer.html' ?>
</body>

</html>