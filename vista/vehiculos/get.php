<?php require_once __DIR__ . '/../../libs/baseView.php';
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
 loadView('../vista/vehiculos/header.php', $data);
?>

<form id="alta_usuario" action="/<?php echo SITE_ROOT ?>/vehiculos/get/" method="POST">
    
	Vehiculo
    <input type="text" name="placa">
	
    <input type="submit" name="enviar" id="enviar" value="Buscar">
</form>


<?php if(isset($placa)){?>
<table>
    <tr>
        <td>
            Marca
        </td>
        <td>
            Tipo
        </td>
		<td>
            Modelo
        </td>
		<td>
            Num_Serie
        </td>
		<td>
            Placa
        </td>
    </tr>
    <tr>
        <td><?php echo $marca?></td>
        <td><?php echo $tipo ?></td>
		<td><?php echo $modelo ?></td>
		<td><?php echo $num_Serie ?></td>
		<td><?php echo $placa ?></td>
        
		<td><a href="/<?php echo SITE_ROOT ?>/vehiculos/edit/<?php echo $placa ?>">Editar</a></td>
        <td><a href="/<?php echo SITE_ROOT ?>/vehiculos/delete/<?php echo $placa ?>">Borrar</a></td>
    </tr>
</table>
<?php }?>

