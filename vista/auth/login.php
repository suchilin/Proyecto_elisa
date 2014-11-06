<?php
if(auth::user_is_logged())
	header("Location:/". SITE_ROOT . "/usuarios/");
loadView('../vista/base.php');
?>
<h1>Login</h1>
<?php

	 if(isset($mensaje))
	 echo $mensaje;
 ?>
<form name="loginF" action="/<?php echo SITE_ROOT ?>/auth/login" method="post">
    Usuario:
    <input type="text" name="usuario"/>
    </br>Contrase&ntilde;a:
    <input type="password" name="pass"/>
    </br>
    <input type="submit" value="Entrar"/>
</form>
