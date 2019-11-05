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
            echo "<script>
                    alert('Adios, vuelve cuando quieras.');
                    window.location.href='Layout.php';
                </script>";  
        ?>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
