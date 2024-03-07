<?php

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) and empty($_POST["password"])){
       echo '<div class="alert alert-danger"> LOS CAMPOS ESTAN VACIOS</div>';

       unset($_POST); 
       // Delay redirect by 5 seconds
       echo "<script>setTimeout(function() { window.location.href = '{$_SERVER['PHP_SELF']}'; }, 2000);</script>";
       exit;

    }else {
    $usuario=$_POST["usuario"];
    $clave=$_POST["password"];
    $sql=$conexion->query("SELECT * FROM usuarios where usuario='$usuario' and clave='$clave'");
    if($datos=$sql->fetch_object()){
        header("location:inicio.php");
        } else {
            echo '<div class="alert alert-danger"> ACCESO DENEGADO</div>';
        }

        unset($_POST); 
        // Delay redirect by 5 seconds
        echo "<script>setTimeout(function() { window.location.href = '{$_SERVER['PHP_SELF']}'; }, 4000);</script>";
        exit;
    }

}

?>