<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>SAGARPA</title>
</head>
<body>
<?php

require_once __DIR__ . '/../libs/includes.php';

?>
<H1>Sistema de control vehicular</h1>
<?php
if(isset($_SESSION['login']) && $_SESSION['login'] !=''){
    echo 'Bienvenido ' . $_SESSION['sess_username'] . '  ';
?>
<a href="/<?php echo SITE_ROOT?>/auth/logout/">Cerrar sesion</a>
<?php }?>
