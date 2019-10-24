<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
    <?php

    echo("<script> alert('HASTA LA PRÓXIMA!')</script>");

                

    $host  = $_SERVER['HTTP_HOST'];    
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'Layout.php';

    echo("<script> window.location.href='http://$host$uri/$extra'; </script>");


        
       

    ?>
</body>
</html>
