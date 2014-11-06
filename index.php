<?php
include 'libs/baseView.php';
$url = $_SERVER['REQUEST_URI'];
$lines = explode("/", $url);
if (count($lines) > 3) {
	echo $lines[1];
	$modulo = $lines[2];
	$metodo = $lines[3];
	require_once 'controlador/' . $modulo . '.php';
	if (isset($lines[4])) {
		$param1 = $lines[4];
		$controlador = new $modulo($metodo, $param1);
	} else {
		$controlador = new $modulo($metodo);
	}
} else {
	loadView('../vista/base.php');
}


          /*    require_once("modelos/perfil.php");
          require_once("modelos/usuario.php");
          require_once("modelos/vehiculo.php");
          require_once("modelos/mantenimiento.php");
          require_once("modelos/taller.php");

          USUARIOS
          $datos_usuario = array(
          "usuario"=>"rosa",
          "es_Admin"=>0,
          "correo_electronico"=>"rosa@sagarpa.gob.mx",
          "contrasenia"=>"123456"
          );

          // USUARIOS; cuando se usa set, se utiliza el arreglo en las estructura y con los demas metodos se usa el nombre
          // $usuario = new user();
          //$usuario->set($datos_usuario);
          //$usuario->edit($datos_usuario);
          /*
          echo "</br>";
          $usuario->get("rosa");
          echo $usuario->usuario;
          echo "</br>";
          echo $usuario->correo_electronico;
          echo "</br>";
          echo $usuario->es_Admin;


          #aqui codigo PERFIL para ver los existentes
          $perfil = new perfiles();
          $perfil->get(2);
          echo $perfil->foto;
          echo "</br>";
          echo $perfil->nombres;
          echo "</br>";
          echo $perfil->apellido_Paterno;
          echo "</br>";
          echo $perfil->apellido_Materno;
          echo "</br>";
          echo $perfil->cader;
          echo "</br>";
          echo $perfil->ddr;
          echo "</br>";
          echo $perfil->delegacion;
          echo "</br>";
          echo $perfil->telefono_Ext;

          /*
          #Array para PERFIL, crear, modificar y eliminar
          $datos_perfil = array(
          "id_Usuario"=>"2",
          "foto"=>"",
          "nombres"=>"Santiago",
          "apellido_Paterno"=>"Montoya",
          "apellido_Materno"=>"Boston",
          "puesto_Laboral"=>"apoyo",
          "cader"=>"Durango",
          "ddr"=>'Canatlan',
          "delegacion"=>"Durango",
          "telefono_Ext"=>"78213"
          );

          $perfil = new perfiles();
          $perfil->edit($datos_perfil);
          #$id_Usuario->delete(4);
           */

#aqui codigo VEHICULOS en existencia

        /* $vehiculo = new vehiculos();
          $vehiculo->get(1);
          echo $vehiculo->id_Vehiculo;
          echo "</br>";
          echo $vehiculo->marca;
          echo "</br>";
          echo $vehiculo->tipo;
          echo "</br>";
          echo $vehiculo->modelo;
          echo "</br>";
          echo $vehiculo->placa;
          echo "</br>";
          echo $vehiculo->num_Serie;
          echo "</br>";
          echo $vehiculo->id_Usuario;
          echo "</br>";
           */
        /*
          #Codigo para crear, modificar y eliminar VEHICULOS
          $datos_vehiculo = array(
          #"id_Vehiculo"=>"2",
          "marca"=>"Ford",
          "tipo"=>"Lobo",
          "modelo"=>"2013",
          "placa"=>"GAV-54-26",
          "num_Serie"=>"12895678",
          "id_Usuario"=>"1"

          );

          $vehiculo = new vehiculos();
          $vehiculo->set($datos_vehiculo);
          #$vehiculo->delete(1);

           */

#Mantenimiento prueba
        /* $mantenimiento = new mantenimientos();
          $mantenimiento->get(3);
          echo $mantenimiento->id_Mantenimiento;
          echo "</br>";
          echo $mantenimiento->tipo_Mantenimiento;
          echo "</br>";
          echo $mantenimiento->costo;
          echo "</br>";
          echo $mantenimiento->fecha;
          echo "</br>";
          echo $mantenimiento->id_Vehiculo;
          echo "</br>";
          echo $mantenimiento->id_Taller;
          echo "</br>";
           */
        /*
          #Codigo para crear, modificar y eliminar MANTENIMIENTOS
          $datos_mantenimiento = array(
          "id_Mantenimiento"=>"17",
          "tipo_Mantenimiento"=>"Preventivo",
          "costo"=>"1230",
          "fecha"=>"2014-22-10",
          "id_Vehiculo"=>"7",
          "id_Taller"=>"1"

          );

          $mantenimiento = new mantenimientos();
          $mantenimiento->edit($datos_mantenimiento);
          #$vehiculo->delete(1);

           */

#aqui codigo TALLER en existencia
        /*
          $taller = new talleres();
          $taller->get(1);
          echo $taller->id_Taller;
          echo "</br>";
          echo $taller->nombre_Taller;
          echo "</br>";
          echo $taller->direccion;
          echo "</br>";
          echo $taller->codigo_Postal;
          echo "</br>";
          echo $taller->telefono_Taller;
          echo "</br>";
          echo $taller->estado;
          echo "</br>";
           */

#Codigo para crear, modificar y eliminar TALLER
        /*    $datos_taller = array(
          "id_Taller"=>"3",
          "nombre_Taller"=>"Francisco Villa",
          "direccion"=>"Bvld. Francisco Villa frente al monumento",
          "codigo_Postal"=>"34000",
          "telefono_Taller"=>"8-15-15-16",
          "estado"=>"Durango"

          );

          $taller = new talleres();
          #$taller->edit($datos_taller);
          #$taller->delete(3);
           */
