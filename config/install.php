<?php

include_once("./config.php");

 $sql = "CREATE TABLE `varon`.`usuarios` (
    `usuario_id` INT NOT NULL AUTO_INCREMENT ,
    `usuario_nombre` VARCHAR(50) NOT NULL , 
    `usuario_apellido` VARCHAR(50) NOT NULL , 
    `usuario_usuario` VARCHAR(50) NOT NULL , 
    `usuario_email` VARCHAR(50) NOT NULL , 
    `usuario_password` VARCHAR(70) NOT NULL , 
    `usuario_rol` VARCHAR(10) NOT NULL , 
PRIMARY KEY (`usuario_id`)) ENGINE = InnoDB;";


mysqli_query($conexion, $sql);

?>