<?php require_once __DIR__ . '/../../libs/baseView.php';
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
 loadView('../vista/vehiculos/header.php', $data);
?>

<form id="alta_vehiculo" action="/<?php echo SITE_ROOT ?>/vehiculos/set/" method="POST">
    Usuario:
	<select name='usuario'>
	    <option></option>
	    <?php
	    foreach ($usuarios as $usuario){
		    echo '<option value='. $usuario['id_Usuario'] .'>' . $usuario['usuario'] . '</option>';
	    }
	    ?>
    </select>
    Marca
    <input type="text" name="marca">
    Tipo
    <input type="text" name="tipo">
	Modelo
    <input type="text" name="modelo">
	Numero de Serie
    <input type="text" name="num_Serie">
    Placa
    <input type="text" name="placa">
    </br>
    <input type="submit" name="enviar" id="enviar" value="Agregar">
</form>
