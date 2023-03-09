<?php
    include("./config/config.php");

    $sql = "SELECT usuario_nombre, usuario_apellido, usuario_email, usuario_password, usuario_foto FROM usuarios WHERE usuario_usuario ='$_SESSION[usuario_login]';";

    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) != 0){

        $usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    }


?>



<style>

.img-login{

    border: 2px solid black;
    border-radius: 50px;
}

</style>




<div class="container px-5 text-center">
  <div class="row gx-1">
    <div class="col">
        <div class="p-3">

            <img class="img-login" src="<?php echo"$usuario[usuario_foto]"?>" alt="Sin foto" width="200" height="200">
        
        </div>

        <div class="p-3">
            <form action="<?php echo('./inc/validar_foto.php') ?>" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="file" class="form-control" name="usuario_foto" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Cambiar foto</button>
                </div>
            </form>
        
        </div>

    

    </div>
    <div class="col">
      <div class="p-3">

      <h1 style="text-shadow: 1px 1px 2px gray;" class="m-3"><ins>Ajustes de usuarios</ins></h1>
        <form action="validar_foto.php" method="post">
            <div class="col m-3">

                <div class="row">
                    <div class="col">
                        <p style="text-shadow: 1px 1px 2px gray;" class="fs-5 text-black">Nombre</p>
                        <input type="text" class="form-control shadow text-center"  placeholder="Eduardo" value="<?php echo($usuario['usuario_nombre']); ?>" readonly>
                    </div>
                    <div class="col">
                        <p style="text-shadow: 1px 1px 2px gray;" class="fs-5 text-black">Apellido</p>
                        <input type="text" class="form-control shadow text-center" placeholder="De la Rosa" value="<?php echo($usuario['usuario_apellido']); ?>" readonly>
                    </div>
                </div>

            </div>

            <div class="col m-3">

                <div class="row">
                    <div class="col">
                        <p style="text-shadow: 1px 1px 2px gray;" class="fs-5 text-black">Email</p>
                        <input type="text" class="form-control shadow text-center " placeholder="example@email.com" value="<?php echo($usuario['usuario_email']); ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="col m-3">

                <div class="row">
                    <div class="col">
                        <p style="text-shadow: 1px 1px 2px gray;" class="fs-5 text-black">Contraseña</p>
                        <input type="password" class="form-control shadow text-center" placeholder="Contraseña" value="<?php echo($usuario['usuario_password']); ?>">
                    </div>
                    <div class="col">
                        <p style="text-shadow: 1px 1px 2px gray;" class="fs-5 text-black">Re-Contraseña</p>
                        <input type="password" class="form-control shadow text-center" placeholder="Re-Contraseña">
                    </div>
                </div>
            </div>

            <div class="col m-3">

                <div class="row">
                    <div class="col">
                        <input class="btn btn-primary" type="submit" value="Modificar Datos" name="actualizar">
                        <input class="btn btn-warning" type="submit" value="Cambiar contraseña" name="actualizar">
                    </div>
                </div>
            </div>
        </form>


      </div>
    </div>
  </div>
</div>