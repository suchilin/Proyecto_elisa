<?php
loadView('../vista/base.php');
if (auth::user_is_logged()) {
	if (!auth::user_is_admin()) {
		header("location:/" . SITE_ROOT . "/usuarios/edit/");
	}
} else {
	header("Location:/" . SITE_ROOT . "/auth/login");
}
?>

<h2>Administrador de usuarios</h2>
<h3><?php echo $subtitulo ?></h3>
<ul>
    <li><a href="/<?php echo SITE_ROOT ?>/usuarios/index/">Inicio</a></li>
    <li><a href="/<?php echo SITE_ROOT ?>/usuarios/get/">Buscar</a></li>
    <li><a href="/<?php echo SITE_ROOT ?>/usuarios/set/">Crear</a></li>
</ul>
<?php echo $mensaje;
?>
