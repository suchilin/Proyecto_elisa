<?php require_once __DIR__ . '/../../libs/baseView.php';
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
 loadView('../vista/vehiculos/header.php',$data);
?>

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
    <?php foreach($vehiculos as $vehiculo){?>
    
    <tr>
	    <td><?php echo $vehiculo['marca']?></td>
        <td><?php echo $vehiculo['tipo']?></td>
		<td><?php echo $vehiculo['modelo']?></td>
		<td><?php echo $vehiculo['num_Serie']?></td>
		<td><?php echo $vehiculo['placa']?></td>
        
        
		<td><a href="/<?php echo SITE_ROOT?>/vehiculos/edit/<?php echo $vehiculo['placa']?>">Editar</a></td>
        <td><a href="/<?php echo SITE_ROOT?>/vehiculos/delete/<?php echo $vehiculo['placa']?>">Borrar</a></td>
    </tr>
    <?php }?>
</table>

