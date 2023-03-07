<?php
    include("./config/config.php");

    $sql = "SELECT * FROM usuarios;";

    $usuarios = mysqli_query($conexion, $sql);

    

?>

<div class="pt-2 m-2 border border-primary">

    <h1 style="text-shadow: 2px 2px 5px rgba(5, 5, 5, 0.88);" class="text-center"><ins>Lista de usuarios</ins></h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="table-secondary">#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th class="table-secondary">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $contador = 0;
                while($fila=mysqli_fetch_array($usuarios, MYSQLI_ASSOC)){
                    $contador++;
                    // echo("<br>");
                    // echo("<div>Nombre: $fila[usuario_nombre]</div>");
                    echo ("
                    
                    <tr>
                        <th scope='row'>$contador</th>
                        <td>$fila[usuario_nombre]</td>
                        <td>$fila[usuario_apellido]</td>
                        <td>$fila[usuario_usuario]</td>
                        <td>$fila[usuario_email]</td>
                        <td>$fila[usuario_rol]</td>
                        <td><button type='button' class='btn btn-primary'><i class='bi bi-pencil-square'></i> Actualizar</button> <button type='button' class='btn btn-danger'><i class='bi bi-trash'></i> Borrar</button></td>
                    </tr>

                    ");
            
                }
            
            ?>
        </tbody>
    </table>
</div>
