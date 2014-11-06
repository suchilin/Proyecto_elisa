<?php
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
 loadView('../vista/usuarios/header.php',$data);
?>

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
    <?php foreach($usuarios as $usuario){?>

    <tr>
        <td><?php echo $usuario['usuario']?></td>
        <td><?php echo $usuario['correo_electronico']?></td>
        <td><?php
        if($usuario['es_Admin']==1){
            echo "Si";
        }else{
            echo "No";
        }?></td>
        <td><a href="/<?php echo SITE_ROOT ?>/usuarios/edit/<?php echo $usuario['usuario']?>">Editar</a></td>
        <td><a href="/<?php echo SITE_ROOT ?>/usuarios/delete/<?php echo $usuario['usuario']?>">Borrar</a></td>
    </tr>
    <?php }?>
</table>

