<?php

require_once __DIR__ . '/../libs/includes.php';

class vehiculos extends bController {

	public function index() {
		$vehiculo = new vehiculosModel();
		$vehiculos = $vehiculo->getAll();
		$data = array(
		    'vehiculos' => $vehiculos,
		    'subtitulo' => 'Inicio',
		    'mensaje' => 'Pagina de inicio'
		);
		loadView('../vista/vehiculos/index.php', $data);
	}

	public function delete($parametro = '') {
		$vehiculo = new vehiculosModel();
		$vehiculo->delete($parametro);
		$data = array(
		    'mensaje' => $vehiculo->mensaje,
		    'subtitulo' => 'Vehiculo:' . $parametro
		);
		loadView('../vista/vehiculos/delete.php', $data);
	}

	public function edit($parametro = '') {
		$vehiculo = new vehiculosModel();
		$usuario = new usuariosModel();
		$usuarios = $usuario->getAll();

		if ($_POST) {
			$parametro = $_POST['placa'];
			$vehiculo->get($parametro);
			$data = array(
			    'marca' => $_POST['marca'],
			    'tipo' => $_POST['tipo'],
			    'modelo' => $_POST['modelo'],
			    'num_Serie' => $_POST['num_Serie'],
			    'placa' => $_POST['placa'],
			    'id_Usuario' =>$_POST['usuario']
			);
			$vehiculo->edit($data);
			
			$data['subtitulo'] = 'Modificar Vehiculo';
			$data['mensaje'] = $vehiculo->mensaje;
			$data['usuarios']=$usuarios;
			$data['id_usuario'] = $vehiculo->id_Usuario;
		} else {
			$vehiculo->get($parametro);
			$data = array(
			    'id_usuario' => $vehiculo->id_Usuario,
			    'marca' => $vehiculo->marca,
			    'tipo' => $vehiculo->tipo,
			    'modelo' => $vehiculo->modelo,
			    'num_Serie' => $vehiculo->num_Serie,
			    'placa' => $vehiculo->placa,
			    'usuarios'=>$usuarios,
			    'mensaje' => $vehiculo->mensaje,
			    'subtitulo' => 'Modificar Vehiculo'
			);
		}
		loadView('../vista/vehiculos/edit.php', $data);
	}

	public function get() {
		if ($_POST) {
			$vehiculo = new vehiculosModel();
			$placa = $_POST['placa'];
			$vehiculo->get($placa);
			$data = array(
			    'marca' => $vehiculo->marca,
			    'tipo' => $vehiculo->tipo,
			    'modelo' => $vehiculo->modelo,
			    'num_Serie' => $vehiculo->num_Serie,
			    'placa' => $vehiculo->placa,
			    'mensaje' => $vehiculo->mensaje,
			    'subtitulo' => 'Buscar Vehiculo'
			);
		} else {
			$data = array(
			    'subtitulo' => 'Buscar Vehiculo',
			    'mensaje' => 'Buscar por Placa'
			);
		}
		loadView('../vista/vehiculos/get.php', $data);
	}

	public function set() {
		$usuario = new usuariosModel();
		$usuarios = $usuario->getAll();

		if ($_POST) {
			$vehiculo = new vehiculosModel();
			$auto_data = array(
			    'marca' => $_POST['marca'],
			    'tipo' => $_POST['tipo'],
			    'modelo' => $_POST['modelo'],
			    'num_Serie' => $_POST['num_Serie'],
			    'placa' => $_POST['placa'],
			    'id_Usuario' =>$_POST['usuario']
			);
			$vehiculo->set($auto_data);
			$data = array(
			    'usuarios'=>$usuarios,
			    'mensaje' => $vehiculo->mensaje,
			    'subtitulo' => 'Agregar otro usuario'
			);
		} else {
			$data = array(
			    'usuarios'=>$usuarios,
			    'subtitulo' => 'Agregar Vehiculo',
			    'mensaje' => 'Agregando...'
			);
		}
		loadView('../vista/vehiculos/add.php', $data);
	}

}
