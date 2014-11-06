<?php
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
 loadView('../vista/usuarios/header.php', $data);
?>
    <form id="alta_usuario" action="/<?php echo SITE_ROOT?>/usuarios/set/" method="POST">
    Nombre
    <input type="text" name="usuario">
    Clave
    <input type="password" name="contrasenia">
    E-mail
    <input type="text" name="correo_electronico">
    <input type="checkbox" name='es_Admin'> Es administrador</br>
    <input type="submit" name="enviar" id="enviar" value="Agregar">
</form>
