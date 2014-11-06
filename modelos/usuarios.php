<?php
require_once __DIR__.'/../libs/sqlquery.php';
class usuariosModel extends sqlQuery{

    public $usuario;
    public $es_Admin;
    public $correo_electronico;
    public $contrasenia;
    public $id_Usuario;

    public function get($usuario = ''){ //metodo get(lectura)
        if($usuario != ''){
            $this->query = "
                                SELECT
                                    *
                                FROM
                                    usuarios
                                WHERE
                                    usuario = '$usuario'
                                ";
            $this->get_results_from_query();
        }
        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuario encontrado';
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }
    }

    public function getAll() {
        $this->query = "CALL GetAllUsers()";
        $this->get_results_from_query();
        $usuarios = $this->rows;
		return $usuarios;
    }

    public function set($datos_usuario = array()){ //metodo set(crear)
        if(array_key_exists('usuario', $datos_usuario)) { //en el arreglo $datos_usuario compara que exista un campo usuario
            $this->get($datos_usuario['usuario']);
            if($datos_usuario['usuario'] != $this->usuario) {

                foreach ($datos_usuario as $campo=>$valor) {
                    $$campo = $valor;
                }
                $this->query = "
                                    INSERT INTO usuarios
                                    (usuario, contrasenia, correo_electronico, es_Admin)
                                    VALUES
                                    ('$usuario', '$contrasenia', '$correo_electronico', '$es_Admin')
                                ";
                $this->exec_query();
                $this->mensaje = 'Usuario agregado exitosamente';
            } else {
                $this->mensaje = 'El usuario ya existe';
            }
        } else {
            $this->mensaje = 'No se ha agregado al usuario';
    }
    }

   public function edit($datos_usuario= array()){
        foreach ($datos_usuario as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "
                            UPDATE usuarios
                            SET usuario='$usuario',
                            correo_electronico='$correo_electronico',
                            es_Admin='$es_Admin',
                            contrasenia='$contrasenia'
                            WHERE usuario = '$usuario'
                        ";
        $this->exec_query();
        $this->mensaje = 'Usuario modificado';
    }

    public function delete($usuario = ''){
        $this->query = "
                            DELETE FROM usuarios
                            WHERE usuario = '$usuario'
                        ";
        $this->exec_query();
        $this->mensaje = 'Usuario eliminado';
    }
}
?>
