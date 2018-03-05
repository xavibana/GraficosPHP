<?php
require_once '../view/personaView.php';
require_once '../model/BBDD.php';
require_once '../model/BDPersona.php';
require_once '../view/Igu.php';

class Persona extends Igu
{
    private $nom;
    private $cognom;
    private $dob;
    private $sexe;
    private $altura;


    /**
     *
     * @param string $fechaNacimiento 5/8/1973
     */
    public function construct()
    {

    }

    public function set($nom="", $cognom="", $fechaNacimiento="", $sexe="", $altura="")
    {
        $this->nom = $nom;
        $this->cognom = $cognom;
        $this->dob = $fechaNacimiento;
        $this->sexe = $sexe;
        $this->altura = $altura;
    }

    //Getters
    public function getNom()
    {
        return $this->nom;
    }


    /**
     * @return mixed
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }


    /**
     * @return la edad de la persona
     */
    public function decirEdad()
    {
        return $this->calcularEdad();
    }

    /**
     * @return int edad de la persona
     */
    private function calcularEdad()
    {
        $diaActual = date('j');
        $mesActual = date('n');
        $añoActual = date('Y');
        list($año, $mes, $dia) = explode("-", $this->dob);
        // si el mes es el mismo pero el dia inferior aun
        // no ha cumplido años, le quitaremos un año al actual
        if (($mes == $mesActual) && ($dia > $diaActual)) {
            $añoActual = $añoActual - 1;
        }
        // si el mes es superior al actual tampoco habra
        // cumplido años, por eso le quitamos un año al actual
        if ($mes > $mesActual) {
            $añoActual = $añoActual - 1;
        }
        // ya no habria mas condiciones, ahora simplemente
        // restamos los años y mostramos el resultado como su edad
        $edad = $añoActual - $año;
        return $edad;
    }
}


?>