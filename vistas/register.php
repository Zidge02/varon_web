<?php

include("./config/config.php");

// Primero comprueba si todos los campos contienen información (Para evitar exploit del inspeccionar)

if (isset($_POST['register'])) {

    if (
        $_POST['usuario_nombre'] != "" || $_POST['usuario_apellido'] != "" || $_POST['usuario_usuario'] != "" ||
        $_POST['usuario_email'] != "" || $_POST['usuario_clave1'] != "" || $_POST['usuario_clave2'] != ""
    ) {

        // Si todos los campos estan rellenos correctamente, va comprobar si el password y el repassword son distintos

        if ($_POST['usuario_clave1'] != $_POST['usuario_clave2']) {

            echo "<div class='alert alert-danger' role='alert'> Las contraseñas no son iguales </div>";
        } else {

            // Si el password y el repassword son iguales va comprobar que el email no este ya registrado en la base de datos.

            $sql = "SELECT usuario_email FROM `usuarios` WHERE usuario_email = '$_POST[usuario_email]' ";

            $resultado = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($resultado) != 0) {

                // Va dar un error de que ya existe en la base de datos un usuario con ese correo electronico

                echo "<div class='alert alert-danger' role='alert'> Ya existe un usuario con esa direccion de correo electrónico </div>";

            } else {

                // Si el correo electrónico no existe en la base de datos, va comprobar si el usuario tampoco existe

                $sql = "SELECT usuario_usuario FROM `usuarios` WHERE usuario_usuario = '$_POST[usuario_usuario]' ";

                $resultado = mysqli_query($conexion, $sql);

                if(mysqli_num_rows($resultado) != 0){

                    echo "<div class='alert alert-danger' role='alert'> Ya existe un usuario con ese nombre de usuario</div>";

                }else{

                    $usuario_nombre = $_POST['usuario_nombre'];
                    $usuario_apellido = $_POST['usuario_apellido'];
                    $usuario_usuario = $_POST['usuario_usuario'];
                    $usuario_email = $_POST['usuario_email'];
                    $usuario_password = $_POST['usuario_clave1'];

                    $contraseña_cifrada = md5($usuario_password);

                    $sql = "INSERT INTO usuarios(usuario_nombre, usuario_apellido, usuario_usuario, usuario_email, usuario_password, usuario_rol) VALUES ('$usuario_nombre', 
                        '$usuario_apellido', '$usuario_usuario', '$usuario_email', '$contraseña_cifrada', 'user')";

                    $resultado = mysqli_query($conexion, $sql);

                        if ($resultado) {
                            echo "<div class='alert alert-success' role='alert'> Te has registrado correctamente </div>";
                        }else {
                            echo "<div class='alert alert-danger' role='alert'> Error inesperado </div>";
                        }
                }
            }
        }

    } else {

        // Si alguno de los campos no esta relleno dara una alerta de error.
        echo "<div class='alert alert-danger' role='alert'> Debe de rellenar todos los campos correctamente </div>";
    }
}

?>


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

            <div class="input-group mb-3">

                <input class="form-control col-3 m-2" type="password" name="usuario_clave1" id=""
                    placeholder="Contraseña" required>
                <input class="form-control col-3 m-2" type="password" name="usuario_clave2" id=""
                    placeholder="Repetir Contraseña" required>
            </div>

            <input class="btn btn-outline-primary" type="submit" value="Registrase" name="register">



        </form>
    </div>
</div>