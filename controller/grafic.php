<?php
/**
 * Created by PhpStorm.
 * User: Xavibana
 * Date: 27/02/2018
 * Time: 20:32
 */
require_once '../Librerias/phpChart_Lite/phpChart.php';
require_once '../model/BDPersona.php';
require_once '../view/personaView.php';
class Grafics
{
    function sexes()
    {
        $bd = new BDPersona();
        $link = $bd->conectar("127.0.0.1", "persona", "root", "");
        $sexes = $bd->consultarSexes($link);
        $masc = $sexes[0];
        $fem = $sexes[1];
        $bd->desconectar($bd);


        $pc = new C_PhpChartX(array(array(0,$masc,null), array(0,0,$fem,null)), 'basic_chart');
        $pc->set_title(array('text' => 'Estadística per Sexes'));
        $pc->set_animate(true);
        $pc->set_legend(array(
            'show' => true,
            'location' => 'e',
            'placement' => 'outside',
            'yoffset' => 30,
            'rendererOptions' => array('numberRows' => 2),
            'labels' => array('Masculí', 'Femení')
        ));
        $pc->draw();
        
    }

    function altura(){
        $bd = new BDPersona();
        $link = $bd->conectar("127.0.0.1", "persona", "root", "");
        $alturas = $bd->consultarAlturas($link);
        //var_dump($alturas);
        $bd->desconectar($bd);


        $pc = new C_PhpChartX(array(array(0,$alturas[0],null), array(0,0,$alturas[1],null),array(0,0,0,$alturas[2],null),array(0,0,0,0,$alturas[3],null),array(0,0,0,0,0,$alturas[4],null),array(0,0,0,0,0,0,$alturas[5],null)), 'basic_chart');
        $pc->set_title(array('text' => 'Estadística per Alçades '));
        $pc->set_animate(true);
        $pc->set_legend(array(
            'show' => true,
            'location' => 'e',
            'placement' => 'outside',
            'yoffset' => 30,
            'rendererOptions' => array('numberRows' => 2),
            'labels' => array('150-160', '160-170','170-180','180-190','190-200','+200')
        ));
        $pc->draw();
    }
}
$grafic=new Grafics();
if (isset($_REQUEST['sexes'])){
    $grafic->sexes();
}else if (isset($_REQUEST['altura'])){
    $grafic->altura();
}else{
    $vista=new personaView();
    $vista->header("grafics");
    $vista->mostrarBotons();
}