<?php
ob_start();
session_start();
include __DIR__ . '/../libs/includes.php';
class auth extends bController {

    public static function user_is_logged(){
        if(isset($_SESSION['login']) && $_SESSION['login'] != "" ){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public static function user_is_admin(){
        $user = $_SESSION['sess_username'];
        $usuario = new usuariosModel();
        $usuario->get($user);
        if($usuario->es_Admin == 1){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function login() {
        $data=array();
        if ($_POST) {
            $usuario = new usuariosModel();
            $user = $_POST['usuario'];
            $pass = $_POST['pass'];
            $usuario->get($user);
            if ($usuario->usuario == $user) {
                if (md5($pass) == $usuario->contrasenia) {
                    $data = array(
                        'username' => $user,
                        'mensaje' => 'Bienvenido'
                    );
                    session_regenerate_id();
                    $_SESSION['sess_username'] = $user;
                    $_SESSION['login'] = "1";
                    session_write_close();
                } else {
                    $data = array(
                        'mensaje' => 'Contrase&ntildea no valida'
                    );
                }
            }else{
                $data = array(
                    'mensaje' => 'Usuario no valido'
                );
            }
        }
        loadView('../vista/auth/login.php', $data);
    }

    public function logout(){
        session_destroy();
        header("Location:/proyecto_elisa/auth/login/");
    }

}


