
<?php
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
if (auth::user_is_admin()) {
		loadView('../vista/usuarios/header.php', $data);
	}else{
		loadView('../vista/base.php');
	}
 
?>
<form id="alta_usuario" action="/proyecto_elisa/usuarios/edit/" method="POST">
    Nombre
    <input type="text" name="usuario" value="<?php echo $usuario ?>">
    E-mail
    <input type="text" name="correo_electronico" value="<?php echo $correo_electronico ?>">
    <?php if(auth::user_is_admin()){?>
    <input type="checkbox" name='es_Admin' <?php echo $es_Admin ?>> Es administrador</br>
    <?php }?>

<h3>Perfil</h3>
Nombres:
<input type="text" name="nombres" value="<?php echo $nombres ?>">
Apellido paterno: 
<input type="text" name="apellido_Paterno" value="<?php echo $apellido_Paterno ?>">
Apellido materno: 
<input type="text" name="apellido_Materno" value="<?php echo $apellido_Materno ?>">
Cader:
<input type="text" name="cader" value="<?php echo $cader ?>">
Distrito: 
<input type="text" name="ddr" value="<?php echo $ddr ?>">
Delegacion: 
<input type="text" name="delegacion" value="<?php echo $delegacion ?>">
Telefono o extension: 
<input type="text" name="telefono_Ext" value="<?php echo $telefono_Ext ?>">
Puesto: 
<input type="text" name="puesto_laboral" value="<?php echo $puesto_laboral ?>">
    <input type="submit" name="enviar" id="enviar" value="Guardar">
</form>
