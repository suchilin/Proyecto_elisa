<?php require_once __DIR__ . '/../../libs/baseView.php';
$data = array(
    'mensaje'=>$mensaje,
    'subtitulo'=>$subtitulo
);
 loadView('../vista/vehiculos/header.php', $data);
?>
