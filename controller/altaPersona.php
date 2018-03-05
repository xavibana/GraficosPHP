<?php
/**
 * Created by PhpStorm.
 * User: Xavibana
 * Date: 27/02/2018
 * Time: 19:48
 */
require_once '../view/personaView.php';
require_once '../model/BBDD.php';
require_once '../model/BDPersona.php';
require_once '../view/Igu.php';


if (isset($_REQUEST['enviar'])) {
    $bd= new BDPersona();
    $link=$bd->conectar("127.0.0.1", "persona", "root", "");
    $persona = new Persona();
    $date=str_replace('/','-',$_REQUEST['fDate']);
    $persona->set($_REQUEST['fNom'], $_REQUEST['fCognom'], $date, $_REQUEST['fSexe'], $_REQUEST['fAltura']);
    $edat = $persona->decirEdad();
    $bd->insertarPersona($link, $persona);
    echo "Vostè té " . $edat . " Anys";
    $bd->desconectar($bd);

} else {
    $vistas = new personaView();
    $vistas->header("Alta Persona");
    $vistas->FormAltaPersona();
    $vistas->footer();

}