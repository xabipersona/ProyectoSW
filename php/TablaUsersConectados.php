<?php 
session_start();

if ($_SESSION["autenticado"] != "SI" || $_SESSION["tipo"]!="normal") {
            //si no existe, envio a la página de autentificación
            header("Location: Layout.php");
            //además salgo de este script
        
            exit();        
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
        <?php
        echo "<table border = ><tr><th>Preguntas insertadas</th><th>Nº total de preguntas</th></tr>";

        $xml = simplexml_load_file("../xml/Questions.xml");
        $NumPreguntas = 0;
        $NumUsers = 0;
        $email = $_SESSION['email'];

        foreach($xml->xpath('//assessmentItem') as $assessmentItem){
            
            $NumPreguntas++;
            $author = $assessmentItem['author'];
            if ($email == $author){
                $NumUsers++;
            }
        }
        echo "<td>$NumUsers</td>
            <td>$NumPreguntas</td>";
        echo "</table>";
    ?>
</body>
</html>