<?php

require_once __DIR__ . '/../libs/includes.php';

class vehiculosModel extends sqlQuery {

	public $id_Vehiculo;
	public $marca;
	public $tipo;
	public $modelo;
	public $placa;
	public $num_Serie;
	public $id_Usuario;

	public function get($placa = '') { //metodo get(lectura)
		if ($placa != '') {
			$this->query = "
                                SELECT
                                    *
                                FROM
                                    vehiculo
                                WHERE
                                    placa = '$placa'
                                ";
			$this->get_results_from_query();
		}
		if (count($this->rows) == 1) {
			$this->mensaje = 'Vehiculo encontrado';
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
		}
	}

	public function getAll() {
		$this->query = "CALL GetAllAutos()";
		$this->get_results_from_query();
		$vehiculo = $this->rows;
		return $vehiculo;
	}

	public function set($datos_vehiculo = array()) { //metodo set(crear)
		foreach ($datos_vehiculo as $campo => $valor) {
			$$campo = $valor;
		}

		$this->query = "
                                INSERT INTO vehiculo
                                    (id_Usuario, marca, tipo, modelo, placa, num_Serie)       
	                        	VALUES
				     ( '$id_Usuario', '$marca','$tipo','$modelo', '$placa', '$num_Serie')
							        		 														 
								";
		$this->exec_query();
		$this->mensaje = 'Vehiculo Agregado Correctamente';
	}

	public function edit($datos_vehiculo = array()) {
		foreach ($datos_vehiculo as $campo => $valor) {
			$$campo = $valor;
		}
		$this->query = "
                            UPDATE vehiculo
                            SET 
						marca='$marca',
						tipo='$tipo',
						modelo='$modelo',
						placa='$placa',
						num_Serie='$num_Serie',
						id_Usuario='$id_Usuario'
                            WHERE placa = '$placa'
                        ";
		$this->exec_query();
		$this->mensaje = 'Vehiculo Modificado';
	}

	public function delete($placa = '') {
		$this->query = "
                            DELETE FROM vehiculo
                            WHERE placa = '$placa'
                       ";
		$this->exec_query();
		$this->mensaje = 'Vehiculo eliminado';
	}

}

?>