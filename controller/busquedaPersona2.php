<?php
/**
 * Created by PhpStorm.
 * User: Xavibana
 * Date: 18/02/2018
 * Time: 16:03
 */

require_once '../view/personaView.php';
require_once '../model/BBDD.php';
require_once '../model/BDPersona.php';
require_once '../view/Igu.php';

$vistas=new personaView();
$vistas->header("Consultar Persona");
if (isset($_REQUEST['enviar'])) {
    $bd =new BDPersona();
    $link=$bd->conectar("127.0.0.1", "persona", "root", "");
    $caracter=$_REQUEST['fCaracter'];
    $personas =$bd->consultarPersona($link,$caracter);
    $vistas->mostrarResultats($personas);
    $bd->desconectar($link);
} else {
    $vistas->formConsulta();
}
$vistas->footer();