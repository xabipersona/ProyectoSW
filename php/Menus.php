<?php if(isset($_GET['email'])){
        $email = "?email=".$_GET['email'];
    }else{
        $email = "";
    } ?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right" id="register"><a href="SignUp.php">Registro</a></span>
        <span class="right" id="login"><a href="LogIn.php">Login</a></span>
        <span class="right" id="logout" style="display:none;"><a href="LogOut.php">Logout</a></span>

</header>
<nav class='main' id='n1' role='navigation'>
    <span><a href='Layout.php<?php echo $GLOBALS["email"];?>'>Inicio</a></span>
    <span id="insertq" style="display:none"><a href='QuestionFormHtml5.php<?php echo $GLOBALS["email"];?>'> Insertar Pregunta</a></span>
    <span id="showq" style="display:none"><a href='ShowQuestionsWithImage.php<?php echo $GLOBALS["email"];?>'>Ver Preguntas</a></span>
    <span id="showxml" style="display:none"><a href='ShowXmlQuestion.php<?php echo $GLOBALS["email"];?>'>Ver Preguntas XML</a></span>
    <span><a href='Credits.php<?php echo $GLOBALS["email"];?>'>Creditos</a></span>
</nav>
    <script src="../js/jquery-3.4.1.min.js"></script>
<script>
    function inicioSesion(){
        $('#insertq').show();
        $('#showq').show();
        $('#register').hide();
        $('#login').hide();
        $('#logout').show();
        $('#showxml').show();
        $("#h1").append("<p><?php echo $_GET["email"];?></p>");
        $("#h1").append("<img width=\"50\" height=\"60\" src=\"data:image/*;base64,<?php echo getImagenDeBD();?>\" alt=\"Imagen\"/>");
    }
    
    function cierreSesion(){
            $('#insertq').hide();
            $('#showq').hide();
            $('#register').show();
            $('#login').show();
            $('#logout').hide();
            $('#showxml').hide();
    }
</script>
<?php
    
    if(isset($_GET['email'])){
        echo "<script>inicioSesion();</script>";
    }else{

        echo "<script>cierreSesion();</script>";
    }
    
    function getImagenDeBD(){
        if(isset($_GET['email'])){
            include 'DbConfig.php';
            $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
            if(!$mysqli){
                die("Error: ".mysqli_connect_error);
            }

            $sql = "SELECT foto FROM usuarios WHERE email=\"".$_GET['email']."\";";
            $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
            if(!$resul){
                die("Error: ".mysqli_error($mysqli));
            }
            $img = mysqli_fetch_array($resul);
            return $img['foto'];
        }
        else{
            return "";
        }
    }
    ?>
    
    
    
    
    
