<?php 

session_start();

include "./head.php";

include "./navbar_admin.php";


if(isset($_POST['actualizar'])){

    include("../config/config.php");

    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE usuario_id ='$id'";
    
    $resultado = mysqli_query($conexion, $sql);
    
    if(mysqli_num_rows($resultado) !=0){

        $rol = $_REQUEST['usuario_cambiar_rol'];
    
        $usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    
        $id = $usuario['usuario_id'];
    
        $sql = "UPDATE usuarios SET usuario_nombre ='$_POST[usuario_nombre]' , usuario_apellido='$_POST[usuario_apellido]', 
        usuario_usuario='$_POST[usuario_usuario]', usuario_email='$_POST[usuario_email]', usuario_rol='$rol' WHERE usuario_id='$id'";
    
        $resultado = mysqli_query($conexion, $sql);
    
        if($resultado){
    
            header("Location: ../index.php?vista=admin_page");
    
        }else{
            echo("Error");
        }
    }
}




?>

<h1 style="text-shadow: 2px 2px 3px rgba(5, 5, 5, 0.88);" class="p-3 text-center"><ins>Actualizar perfil</ins></h1>

<div class="p-5 container text-center">

    <div class="row">
        <form method="post">

            <div class="input-group mb-3">

                <input class="form-control col-3 m-2" type="text" name="usuario_nombre" id="" placeholder="Nombre"
                    required autocomplete="off">
                <input class="form-control col-3 m-2" type="text" name="usuario_apellido" id="" placeholder="Apellido"
                    required autocomplete="off">
            </div>

            <div class="input-group mb-3">

                <input class="form-control col-3 m-2" type="text" name="usuario_usuario" id="" placeholder="Usuario"
                    required autocomplete="off">
                <input class="form-control col-3 m-2" type="email" name="usuario_email" id="" placeholder="Email"
                    required autocomplete="off">

            </div>
            <div class="input-group mb-3 text-center justify-content-center">

                <select id="usuario_cambiar_rol" name="usuario_cambiar_rol">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>

            </div><br><br>

            <input class="btn btn-outline-primary" type="submit" value="Actualizar" name="actualizar">



        </form>
    </div>
</div>