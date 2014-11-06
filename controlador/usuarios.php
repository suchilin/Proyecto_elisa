<?php

include __DIR__ . '/../libs/includes.php';

class usuarios extends bController {

	public function index() {
		$usuario = new usuariosModel();
		$usuarios = $usuario->getAll();
		$data = array(
		    'usuarios' => $usuarios,
		    'subtitulo' => 'Inicio',
		    'mensaje' => 'Pagina de inicio'
		);
		loadView('../vista/usuarios/index.php', $data);
	}

	public function delete($parametro = '') {
		$usuario = new usuariosModel();
		$usuario->delete($parametro);
		$data = array(
		    'mensaje' => $usuario->mensaje,
		    'subtitulo' => 'Usuario:' . $parametro
		);
		loadView('../vista/usuarios/delete.php', $data);
	}

	public function edit($parametro = '') {
		$usuario = new usuariosModel();

		$uPerfil = new perfilesModel();

		if ($_POST) {
			$parametro = $_POST['usuario'];
			if (isset($_POST['es_Admin'])) {
				$esadmin = 1;
				$checked = 'checked';
			} else {
				$esadmin = 0;
				$checked = '';
			}
			$datos_usuario = array(
			    'usuario' => $_POST['usuario'],
			    'correo_electronico' => $_POST['correo_electronico'],
			    'es_Admin' => $esadmin,
			);
			
			$usuario->get($_POST['usuario']);
			$datos_usuario['contrasenia'] = $usuario->contrasenia;
			$usuario->edit($datos_usuario);
			
			
			$datos_perfil = array(
			    'id_Usuario'=>$usuario->id_Usuario,
			    'nombres'=>$_POST['nombres'],
			    'apellido_Paterno'=>$_POST['apellido_Paterno'],
			    'apellido_Materno'=>$_POST['apellido_Materno'],
			    'cader'=>$_POST['cader'],
			    'ddr'=>$_POST['ddr'],
			    'delegacion'=>$_POST['delegacion'],
			    'telefono_Ext'=>$_POST['telefono_Ext'],
			    'puesto_laboral'=>$_POST['puesto_laboral']
			);
			$uPerfil->edit($datos_perfil);
			//$uPerfil->get($usuario->id_Usuario);
			$data = array_merge($datos_perfil,$datos_usuario);
			$data['subtitulo'] = 'Modificar usuario';
			$data['mensaje'] = $usuario->mensaje;
			$data['mensaje_perfil'] = $uPerfil->mensaje;
			$data['es_Admin'] = $checked;
		} else {
			if (auth::user_is_admin()) {
				$usuario->get($parametro);
			} else {
				$usuario->get($_SESSION['sess_username']);
			}
			if ($usuario->es_Admin == 1) {
				$checked = 'checked';
			} else {
				$checked = '';
			}
			$uPerfil->get($usuario->id_Usuario);
			$data = array(
			    'usuario' => $usuario->usuario,
			    'correo_electronico' => $usuario->correo_electronico,
			    'es_Admin' => $checked,
			    'mensaje' => $usuario->mensaje,
			    'mensaje_perfil'=>$uPerfil->mensaje,
			    'nombres'=>$uPerfil->nombres,
			    'apellido_Paterno'=>$uPerfil->apellido_Paterno,
			    'apellido_Materno'=>$uPerfil->apellido_Materno,
			    'cader'=>$uPerfil->cader,
			    'ddr'=>$uPerfil->ddr,
			    'delegacion'=>$uPerfil->delegacion,
			    'telefono_Ext'=>$uPerfil->telefono_Ext,
			    'puesto_laboral'=>$uPerfil->puesto_Laboral,
			    'subtitulo' => 'Modificar usuario'
			);
		}
		loadView('../vista/usuarios/edit.php', $data);
	}

	public function get() {
		if ($_POST) {
			$usuario = new usuariosModel();
			$usuario_ = $_POST['usuario'];
			$usuario->get($usuario_);
			$data = array(
			    'usuario' => $usuario->usuario,
			    'correo_electronico' => $usuario->correo_electronico,
			    'es_Admin' => $usuario->es_Admin,
			    'mensaje' => $usuario->mensaje,
			    'subtitulo' => 'Buscar usuario'
			);
		} else {
			$data = array(
			    'subtitulo' => 'Buscar usuario',
			    'mensaje' => 'Buscar por nick'
			);
		}
		loadView('../vista/usuarios/get.php', $data);
	}

	public function set() {

		if ($_POST) {
			$usuario = new usuariosModel();
			$uPerfil = new perfilesModel();
			if (isset($_POST['es_Admin'])) {
				$esa = 1;
			} else {
				$esa = 0;
			}
			$pass = md5($_POST['contrasenia']);
			$user_data = array(
			    'usuario' => $_POST['usuario'],
			    'contrasenia' => $pass,
			    'correo_electronico' => $_POST['correo_electronico'],
			    'es_Admin' => $esa
			);
			$usuario->set($user_data);
			$mensaje_ = $usuario->mensaje;
			$usuario->get($_POST['usuario']);
			echo $usuario->id_Usuario;
			$uPerfil->set(array('id_Usuario' => $usuario->id_Usuario));
			$data = array(
			    'mensaje' => $mensaje_,
			    'subtitulo' => 'Agregar otro usuario'
			);
		} else {
			$data = array(
			    'subtitulo' => 'Agregar usuario',
			    'mensaje' => 'Agregando...'
			);
		}
		loadView('../vista/usuarios/add.php', $data);
	}

}
