<?php
    session_start();
    
    include("../config/config.php");

    $nombre = $_SESSION['usuario_login'];

    $foto = $_FILES['usuario_foto']['name'];

    $ruta = $_FILES['usuario_foto']['tmp_name'];

    $destino = "../img/img_usuarios/". $_SESSION['usuario_login'].'_'.$foto;

    $destinoDB = "./img/img_usuarios/". $_SESSION['usuario_login'].'_'.$foto;

    copy($ruta, $destino);


    $sql = "UPDATE usuarios SET usuario_foto = '$destinoDB' WHERE usuario_usuario = '$_SESSION[usuario_login]'";

    $resultado = mysqli_query($conexion, $sql);

    header("Location: ../index.php?vista=user_page");



?>