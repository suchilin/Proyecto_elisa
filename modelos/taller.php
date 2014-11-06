<?php
require_once('modelos/sqlquery.php');

class talleres extends sqlQuery{

    public $id_Taller;
	public $nombre_Taller;
	public $direccion;
	public $codigo_Postal;
	public $telefono_Taller;
	public $estado;

public function get($id_Taller = ''){ //metodo get(lectura)
        if($id_Taller != ''){
            $this->query = "
                                SELECT
                                    *
                                FROM
                                    taller
                                WHERE
                                    id_Taller = '$id_Taller'
                                ";
            $this->get_results_from_query();
        }
        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
        }
    }

public function set($datos_mantenimiento = array()){ //metodo set(crear)
				foreach ($datos_mantenimiento as $campo=>$valor) {
                    $$campo = $valor;
                }

                $this->query = "
                                INSERT INTO taller
                                    (nombre_Taller, direccion, codigo_Postal, telefono_Taller, estado)                              	    							                                 VALUES
									( '$nombre_Taller', '$direccion','$codigo_Postal', '$telefono_Taller', '$estado')
							        		 														 
								";
                $this->exec_query();
                echo 'Taller Agregado Correctamente';
               }

   public function edit($datos_taller= array()){
        foreach ($datos_taller as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "
                            UPDATE taller
                            SET nombre_Taller='$nombre_Taller',
							id_Taller='$id_Taller',
                            direccion='$direccion',
							codigo_Postal='$codigo_Postal',
							telefono_Taller='$telefono_Taller',
							estado='$estado'
                            WHERE id_Taller = '$id_Taller'
                        ";
        $this->exec_query();
        echo 'Taller Modificado';
    }

    public function delete($id_Taller = ''){
        $this->query = "
                            DELETE FROM taller
                            WHERE id_Taller = '$id_Taller'
                        ";
        $this->exec_query();
        echo 'Taller Eliminado';
    }



}



?>