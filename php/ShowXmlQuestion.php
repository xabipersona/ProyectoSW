<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <?php

        echo "<table border = ><tr><th>Email</th><th>Enunciado</th><th>Respuesta Correcta</th></tr>";

        $xml = simplexml_load_file("../xml/Questions.xml");

        foreach($xml->xpath('//assessmentItem') as $assessmentItem){

            $author = $assessmentItem['author'];
            $enunciado = $assessmentItem->itemBody->p;
            $correcta = $assessmentItem->correctResponse->value;
            
            echo "<tr>
                    <td>$author</td>
                    <td>$enunciado</td>
                    <td>$correcta</td>
                  </tr>";
        }
        echo "</table>";
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>