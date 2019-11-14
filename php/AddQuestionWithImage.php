<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
  
  <section class="main" id="s1">
    <div>
         <?php
            if(isset($_REQUEST['dirCorreo'])){
                $regexMail="/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
                $regexPreg="/^.{10,}$/";
                 if(preg_match($regexMail,$_REQUEST['dirCorreo'])){
                     if(preg_match($regexPreg,$_REQUEST['nombrePregunta'])){
                            include 'DbConfig.php';
                            //Creamos la conexion con la BD.
                            $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
                            if(!$mysqli)
                            {
                                die("Fallo al conectar a MySQL: " .mysqli_connect_error());
                            }
                            //Creamos la consulta que introducira los datos en el servidor
                            $email = $_REQUEST['dirCorreo'];
                            $enunciado = $_REQUEST['nombrePregunta'];
                            $respuestac = $_REQUEST['respuestaCorrecta'];
                            $respuestai1 = $_REQUEST['respuestaIncorrecta1'];
                            $respuestai2 = $_REQUEST['respuestaIncorrecta2'];
                            $respuestai3 = $_REQUEST['respuestaIncorrecta3'];
                            $complejidad = $_REQUEST['complejidad'];
                            $tema = $_REQUEST['temaPregunta'];
                            //$image = $_FILES['Imagen']['tmp_name'];
                            //$contenido_imagen = base64_encode(file_get_contents($image));
                            $contenido_imagen = null; 
                            $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema, imagen) VALUES('$email', '$enunciado', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3', $complejidad, '$tema', '$contenido_imagen')";

                            if(!mysqli_query($mysqli,$sql))
                            {
                                die("Error: " .mysqli_error($mysqli));
                            }

                            //LAB 4 incluir las preguntas en el fichero Questions.xml

                            $xml = simplexml_load_file("../xml/Questions.xml");
                            
                            $question = $xml->addChild('assessmentItem');
                            $question->addAttribute('subject',$tema);
                            $question->addAttribute('author',$email);

                            $parrafo = $question->addChild('itemBody');
                            $parrafo->addChild('p',$enunciado);

                            $value = $question->addChild('correctResponse');
                            $value->addChild('value',$respuestac);

                            $valuesi = $question->addChild('incorrectResponses');
                            $valuesi->addChild('value',$respuestai1);
                            $valuesi->addChild('value',$respuestai2);
                            $valuesi->addChild('value',$respuestai3);


                            $xml->asXML('../xml/Questions.xml');

                            echo "Registro añadido en la BD<br>";
                            echo "Registro añadido en Questions.xml<br>";
                            echo "<a href=\"ShowQuestionsWithImage.php?email=".$_GET['email']."\">Click en este enlace para ver todos los registros.</a>";
                            mysqli_close($mysqli);

                     }else{
                         echo "El enunciado de la pregunta debe tener mas de 10 caracteres.<br>";
                         echo"<a href='javascript:history.back()'>Volver al formulario.</a>";
                     }
                 }else{
                    echo "El correo electronico no es correcto.<br>";
                    echo"<a href='javascript:history.back()'>Volver al formulario.</a>";
                 }
            }          
          ?>
    </div>
  </section>
  
</body>
</html>
