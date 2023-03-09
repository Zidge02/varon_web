<?php 

session_start();

include("../config/config.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM `usuarios` WHERE usuario_id = $id";
    
    $resultado = mysqli_query($conexion, $sql);
    
        if($resultado){
    
            header("Location: ../index.php?vista=admin_page");

            
    
        }else{

            echo("Error");
        }
?>