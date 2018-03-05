<?php
/**
 * Created by PhpStorm.
 * User: Xavibana
 * Date: 26/02/2018
 * Time: 16:39
 */

class Igu
{

    /**
     * Igu constructor.
     * @param $titol
     */
    public function __construct()
    {
;
    }


    public function header($titol){
        echo '<html><head><meta content="text/html charset=utf-8" /><title>'.$titol.'</title></head>';
    }

    public function footer(){
        echo '<div> SOY EL FOOTER </div></html>';
    }

}