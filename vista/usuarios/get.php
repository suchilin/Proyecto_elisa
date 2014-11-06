<?php
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
 loadView('../vista/usuarios/header.php', $data);
?>

    <form id="alta_usuario" action="/<?php echo SITE_ROOT ?>/usuarios/get/" method="POST">
    Nombre
    <input type="text" name="usuario">
    <input type="submit" name="enviar" id="enviar" value="Buscar">
</form>


<?php if(isset($usuario)){?>
<table>
    <tr>
        <td>
            Usuario
        </td>
        <td>
            Correo electronico
        </td>
        <td>
            Es Administrador
        </td>
    </tr>
    <tr>
        <td><?php echo $usuario?></td>
        <td><?php echo $correo_electronico ?></td>
        <td><?php if($es_Admin==1){
            echo 'Si';
        }else{
            echo 'No';
        }
        ?></td>
        <td><a href="/<?php echo SITE_ROOT ?>/usuarios/edit/<?php echo $usuario?>">Editar</a></td>
        <td><a href="/<?php echo SITE_ROOT ?>/usuarios/delete/<?php echo $usuario?>">Borrar</a></td>
    </tr>
</table>
<?php }?>

