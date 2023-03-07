<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./inc/head.php" ?>
</head>
<body>
    <?php
        session_start();

        if(!isset($_SESSION['usuario_login']) || $_SESSION['usuario_login'] == ""){

            if(!isset($_GET['vista']) || $_GET['vista'] ==""){
            
                $_GET['vista'] = "principal";
            
            }
    
            if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!= "principal" && $_GET['vista']!= "404"){
    
                include "./inc/navbar.php";
                include "./vistas/".$_GET['vista'].".php";
            }else{
    
                if($_GET['vista'] == "principal"){
    
                    include "./inc/navbar.php";
                    include "./vistas/principal.php";
                }else{
    
                    include "./vistas/404.php";
                }
            }

        }else{

            if(!isset($_GET['vista']) || $_GET['vista'] ==""){
            
                $_GET['vista'] = "principal";
            
            }
    
            if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!= "principal" && $_GET['vista']!= "404"){
                
                if($_SESSION['usuario_rol'] == "user"){
                    include "./inc/navbar_user.php";
                }else{
                    include "./inc/navbar_admin.php";
                }
                
                include "./vistas/".$_GET['vista'].".php";
            }else{
    
                if($_GET['vista'] == "principal"){
    
                    if($_SESSION['usuario_rol'] == "user"){
                        include "./inc/navbar_user.php";
                    }else{
                        include "./inc/navbar_admin.php";
                    }
                    
                    include "./vistas/principal.php";
                }else{
    
                    include "./vistas/404.php";
                }
            }
        }
        
    ?>
</body>
</html>