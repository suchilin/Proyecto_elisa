<?php
loadView('../vista/base.php');
if (auth::user_is_logged()) {
	if (!auth::user_is_admin()) {
		#header("location:/" . SITE_ROOT . "/vehiculos/edit/");
		echo "Usted no es admin SORRY! :)";
		exit();
	}
} else {
	header("Location:/" . SITE_ROOT . "/auth/login");
}
?>
<h1>Administrador de Vehiculos</h1>
<h3><?php echo $subtitulo ?></h3>
<ul>
    <li><a href="/<?php echo SITE_ROOT?>/vehiculos/index/">Inicio</a></li>
    <li><a href="/<?php echo SITE_ROOT?>/vehiculos/get">Buscar</a></li>
    <li><a href="/<?php echo SITE_ROOT?>/vehiculos/set/">Crear</a></li>
</ul>
<?php echo $mensaje ?>
