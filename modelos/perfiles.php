<?php

require_once __DIR__ . '/../libs/sqlquery.php';

class perfilesModel extends sqlQuery {

	public $foto;
	public $nombres;
	public $apellido_Paterno;
	public $apellido_Materno;
	public $cader;
	public $ddr;
	public $delegacion;
	public $telefono_Ext;
	public $puesto_Laboral;
	private $id_Usuario;

	public function get($id_Usuario = '') { //metodo get(lectura)
		if ($id_Usuario != '') {
			$this->query = "
                                SELECT
                                    *
                                FROM
                                    perfil
                                WHERE
                                    id_Usuario = '$id_Usuario'
                                ";
			$this->get_results_from_query();
		}
		if (count($this->rows) == 1) {
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
		}
	}

	public function set($datos_perfil = array()) { //metodo set(crear)
		if (array_key_exists('id_Usuario', $datos_perfil)) {
			$this->get($datos_perfil['id_Usuario']);
			if ($datos_perfil['id_Usuario'] != $this->id_Usuario) {

				foreach ($datos_perfil as $campo => $valor) {
					$$campo = $valor;
				}
				if (isset($foto) == FALSE) {
					$foto = "";
				}
				if (isset($nombres) == FALSE) {
					$nombres = "";
				}
				if (isset($apellido_Paterno) == FALSE) {
					$apellido_Paterno = "";
				}
				if (isset($apellido_Materno) == FALSE) {
					$apellido_Materno = "";
				}
				if (isset($cader) == FALSE) {
					$cader = "";
				}
				if (isset($puesto_Laboral) == FALSE) {
					$puesto_Laboral = "";
				}
				if (isset($ddr) == FALSE) {
					$ddr = "";
				}
				if (isset($delegacion) == FALSE) {
					$delegacion = "";
				}
				if (isset($telefono_Ext) == FALSE) {
					$telefono_Ext = 0;
				}

				$this->query = "
                                    INSERT INTO perfil
                                    (id_Usuario, foto, nombres, apellido_Paterno, apellido_Materno, cader, puesto_Laboral, ddr, delegacion, telefono_Ext)
                                    VALUES('$id_Usuario', '$foto','$nombres','$apellido_Paterno',
                                    '$apellido_Materno','$cader', '$puesto_Laboral','$ddr', '$delegacion','$telefono_Ext')

                                ";
				$this->exec_query();
				$this->mensaje = 'Perfil se agrego exitosamente';
			} else {
				$this->mensaje = 'El perfil ya existe';
			}
		} else {
			$this->mensaje = 'No se agrego el perfil, sigue intentando';
		}
	}

	public function edit($datos_perfil = array()) {
		foreach ($datos_perfil as $campo => $valor) {
			$$campo = $valor;
		}

		if (isset($foto) == FALSE) {
			$foto = "";
		}
		if (isset($nombres) == FALSE) {
			$nombres = "";
		}
		if (isset($apellido_Paterno) == FALSE) {
			$apellido_Paterno = "";
		}
		if (isset($apellido_Materno) == FALSE) {
			$apellido_Materno = "";
		}
		if (isset($cader) == FALSE) {
			$cader = "";
		}
		if (isset($puesto_Laboral) == FALSE) {
			$puesto_Laboral = "";
		}
		if (isset($ddr) == FALSE) {
			$ddr = "";
		}
		if (isset($delegacion) == FALSE) {
			$delegacion = "";
		}
		if (isset($telefono_Ext) == FALSE) {
			$telefono_Ext = 0;
		}

		$this->query = "
                            UPDATE perfil
                            SET foto='$foto',
							id_Usuario='$id_Usuario',
                            nombres='$nombres',
							apellido_Paterno='$apellido_Paterno',
							apellido_Materno='$apellido_Materno',
							puesto_Laboral='$puesto_Laboral',
							cader='$cader',
							ddr='$ddr',
							delegacion='$delegacion',
							telefono_Ext='$telefono_Ext'
                            WHERE id_Usuario = '$id_Usuario'
                        ";
		$this->exec_query();
		$this->mensaje = 'Perfil Modificado';
	}

	public function delete($id_Usuario = '') {
		$this->query = "
                            DELETE FROM perfil
                            WHERE id_Usuario = '$id_Usuario'
                        ";
		$this->exec_query();
		$this->mensaje = 'Perfil eliminado';
	}

}

?>
