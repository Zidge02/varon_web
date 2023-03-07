<?php
include("./config/config.php");

// Evento login al darle al boton de logearse
if(isset($_POST['login'])){

    // Variables de login y contraseña
    $usuario_usuario = $_POST['usuario_usuario'];
    $usuario_password = $_POST['usuario_password'];

    // Comprueba si los campos estan rellenos correctamente
    if($_POST['usuario_usuario'] != "" || $_POST['usuario_password'] != ""){

        // SI estan rellenos correctamente, va comprobar los datos en la DB.

        $sql = "SELECT * FROM usuarios WHERE usuario_usuario = '$usuario_usuario' and usuario_password = MD5('$usuario_password');";

        $resultado = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($resultado) == 1){

            echo "<div class='alert alert-success' role='alert'> Has iniciado correctamente </div>";

            //session_start();
            $datos_usuario=mysqli_fetch_array($resultado,MYSQLI_ASSOC);

            $_SESSION['usuario_login'] = $datos_usuario['usuario_usuario'];
            $_SESSION['usuario_rol'] = $datos_usuario['usuario_rol'];

            // Obra maestra de Raquel 
            header("Location: ../varon/index.php?vista=principal");
            //
        }else{

            echo "
            <div class='alert alert-danger' role='alert'>

            La constraseña o el usuario no son correctos. <a href='index.php?vista=register' class='alert-link'>Pulsa aquí</a> si aun no te has registrado.

            </div>";

            //echo(md5($usuario_password));

            //sleep(5);

            //header("Location: https://getbootstrap.com/docs/4.2/components/alerts/");
        }
        

        // En caso de no estar rellenos los campos dara este mensaje de error.
    }else{

        echo "<div class='alert alert-danger' role='alert'> Todos los compos deben de estar rellenos. </div>";
    }

}

// Funcion de contraseña olvidada

if(isset($_POST['change_password'])){

    $usuario_usuario = $_POST['usuario_usuario_cPassword'];

    if($_POST['usuario_usuario_cPassword'] !=""){

        $sql = "SELECT usuario_email FROM usuarios WHERE usuario_usuario = '$usuario_usuario'";
        $resultado = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($resultado) == 1){

            session_start();
            $datos_usuario=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
            $_SESSION['usuario_email'] = $datos_usuario['usuario_email'];

            mail($_SESSION['usuario_email'], "Casa Varon: Cambio de contraseña", "Texto de prueba");
        }else{
            // Error de que ese usuario no existe
        }

    }else{
        // Error de rellene todos los campos
    }
}





?>

<div class="p-5 container text-center">
    <div class="row">
        <form method="post">

            <div class="input-group mb-3">

                <input class="form-control col-3 m-2" type="text" name="usuario_usuario" id="" placeholder="Usuario"
                    required autocomplete="on">
                <input class="form-control col-3 m-2" type="password" name="usuario_password" id="" placeholder="Contraseña"
                    required autocomplete="off">
            </div>

            <input class="btn btn-outline-primary" type="submit" value="Iniciar Sesión" name="login"><br><br>

            <a href="javascript:abrir()">¿Has olvidado la contraseña?</a>


        </form>
    </div>
</div>


<style>

.ventana{

    background: rgba(135, 135, 135, 0.22);
    width: 30%;
    color: black;
    fort-size: 18px;
    text-align: center;
    padding: 33px;
    min-height: 250px;
    border: 1.5px solid black;
    border-radius: 30px;
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.822);
    position: absolute;
    left: 35%;
    top: 35%;
    display: none;
}

.cerrarA{

    position: absolute;
    right: 18px;
    top: 5px;
}

</style>

<div id="ventanitaA"class="ventana">

    <div class="cerrarA"><a href="javascript:cerrar()"><i class="bi bi-x-circle"></i></a></div>
    <h5>¿Has olvidado la contraseña?</h5>
    <p>Indicanos tu nombre de usuario y mandaremos un correo a la direccion de correo asignada para cambiar la contraseña</p>

    <form method="post">

            <div class="input-group mb-3">

                <input class="form-control col-3 m-2" type="text" name="usuario_usuario_cPassword" id="" placeholder="Usuario"
                    required autocomplete="on">
            </div>

            <input class="btn btn-outline-primary" type="submit" value="Enviar" name="change_password"><br>

        </form>

</div>


<script>

    function abrir(){

        document.getElementById("ventanitaA").style.display ="block";
    }

    function cerrar(){

        document.getElementById("ventanitaA").style.display ="none";
    }

</script>