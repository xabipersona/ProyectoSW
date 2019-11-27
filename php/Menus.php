    <div id='page-wrap'>
    
    <header class='main' id='h1'>
        
        <span class="right" id="register"><a href="SignUp.php">Registro</a></span>
        <span class="right" id="login"><a href="LogIn.php">Login</a></span>
        <span class="right" id="logout" style="display:none;"><a href="LogOut.php">Logout</a></span>
        <span class="right" id="foto" style="display:none"><img id="image" width=\"50\" height=\"60\" alt=\"Imagen\"/></span>

    </header>
        
        <nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span>
        <span id="gestionar" style="display:none"><a href='HandlingQuizesAjax.php'>Gestionar Preguntas</a></span>
        <span id="gestCuentas" style="display:none"><a href="HandlingAccounts.php">Gestionar Usuarios</a></span>
        <span><a href='Credits.php'>Creditos</a></span>
        </nav>
    
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script>
        
        function inicioSesion(){
        
            $('#register').hide();
            $('#login').hide();
            $('#logout').show();
            $('#gestionar').show();
            $('#foto').show();
            $('#image').css('src', "\'data:image/*;base64,"+getImagenDeBD()+"\'");
        

        }
    
        function cierreSesion(){
            
            $('#register').show();
            $('#login').show();
            $('#logout').hide();
            $('#gestionar').hide();
            $('#foto').hide();

        }

        function inicioSesionAdmin(){

            $('#register').hide();
            $('#login').hide();
            $('#logout').show();
            $('#gestCuentas').show();
            $('#foto').show();
            
          
        }
        
        </script>
<?php
    
    if(isset($_SESSION['email'])){

        if ($_SESSION['email'] == "admin@ehu.es"){

            echo "<script>inicioSesionAdmin();</script>";
        }
        
        else {

            echo "<script>inicioSesion();</script>";
        }    
    }else{

        echo "<script>cierreSesion();</script>";
    }
    
    function getImagenDeBD(){

        if(isset($_SESSION['email'])){
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
    
    
    
    
    
