<div class="pt-2 m-2 border border-primary">

    <h1 style="text-shadow: 2px 2px 3px rgba(5, 5, 5, 0.88);" class="text-center"><ins>Lista de usuarios</ins></h1>

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
                include("./config/config.php");
                
                $sql = "SELECT * FROM usuarios;";

                $usuarios = mysqli_query($conexion, $sql);

                while($fila=mysqli_fetch_array($usuarios, MYSQLI_ASSOC)){
                    ?>
                    
                    
                    <tr>
                        <th scope='row'><?php echo($fila['usuario_id']) ?></th>
                        <td><?php echo($fila['usuario_nombre']) ?></td>
                        <td><?php echo($fila['usuario_apellido']) ?></td>
                        <td><?php echo($fila['usuario_usuario']) ?></td>
                        <td><?php echo($fila['usuario_email']) ?></td>
                        <td><?php echo($fila['usuario_rol']) ?></td>
                        <td>
                            <a class='nav-link active text-center btn btn-primary m-1' href="./inc/editar_usuario.php?id=<?php echo$fila['usuario_id'];?>"><i class='bi bi-pencil-square'></i>Actualizar</a>
                            <a class='nav-link active text-center btn btn-danger m-1' href="./inc/borrar_usuario.php?id=<?php echo$fila['usuario_id'];?>"><i class='bi bi-trash'></i> Borrar</a>
                        </td>
                    </tr>
            
                <?php }?>
            
        </tbody>
    </table>
</div>