<?php
require_once('modelos/sqlquery.php');

class mantenimientos extends sqlQuery{

public $id_Mantenimiento;
public $id_Vehiculo;
public $id_Taller;
public $tipo_Mantenimiento;
public $costo;
public $fecha;


public function get($id_Mantenimiento = ''){ //metodo get(lectura)
        if($id_Mantenimiento != ''){
            $this->query = "
                                SELECT
                                    *
                                FROM
                                    mantenimiento
                                WHERE
                                    id_Mantenimiento = '$id_Mantenimiento'
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
                                INSERT INTO mantenimiento
                                    (tipo_Mantenimiento,id_Vehiculo, id_Taller,  costo, fecha)                              	    							VALUES
									( '$tipo_Mantenimiento', '$id_Taller','$id_Vehiculo', '$costo', '$fecha')
							        		 														 
								";
                $this->exec_query();
                echo 'Mantenimiento Agregado Correctamente';
               }

   public function edit($datos_mantenimiento= array()){
        foreach ($datos_mantenimiento as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "
                            UPDATE mantenimiento
                            SET id_Mantenimiento = '$id_Mantenimiento',
							tipo_Mantenimiento ='$tipo_Mantenimiento',
							costo='$costo',
							fecha= '$fecha',
							id_Vehiculo='$id_Vehiculo',
							id_Taller ='$id_Taller'
                            WHERE id_Mantenimiento = '$id_Mantenimiento'
                        ";
        $this->exec_query();
        echo 'Mantenimiento Modificado';
    }

    public function delete($id_Mantenimiento = ''){
        $this->query = "
                            DELETE FROM mantenimiento
                            WHERE id_Mantenimiento = '$id_Mantenimiento'
                       ";
        $this->exec_query();
        echo 'Mantenimiento Eliminado';
    }



}

?>