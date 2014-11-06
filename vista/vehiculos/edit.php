<?php 
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
	loadView('../vista/vehiculos/header.php', $data);
	
?>
<form id="alta_vehiculo" action="/<?php echo SITE_ROOT ?>/vehiculos/edit/" method="POST">
    Usuario:
	<select name='usuario'>
	    <option></option>
	    <?php
	    foreach ($usuarios as $usuario){
		    if($usuario['id_Usuario']==$id_usuario){
			    echo '<option value='. $usuario['id_Usuario'] .' selected>' . $usuario['usuario'] . '</option>';
		    }else{
			    echo '<option value='. $usuario['id_Usuario'] .'>' . $usuario['usuario'] . '</option>';
		    }
	    }
	    ?>
    </select>
    Marca
    <input type="text" name="marca" value="<?php echo $marca ?>">
    Tipo
    <input type="text" name="tipo" value="<?php echo $tipo ?>">
	Modelo
    <input type="text" name="modelo" value="<?php echo $modelo ?>">
	Numero de Serie
    <input type="text" name="num_Serie" value="<?php echo $num_Serie ?>">
    Placa
    <input type="text" name="placa" value="<?php echo $placa ?>">
    </br>
    <input type="submit" name="enviar" id="enviar" value="Editar">
</form>
