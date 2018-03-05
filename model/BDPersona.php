<?php

require_once '../controller/persona.php';

class BDPersona extends BBDD
{

    function insertarPersona($link, $persona)
    {
        $nom = $persona->getNom();
        $cognom = $persona->getCognom();
        $dob = $persona->getDob();
        $sexe = $persona->getSexe();
        $altura = $persona->getAltura();
        $link->exec("INSERT INTO `persona` (`nom`, `cognom`, `dob`, `sexe`, `altura`) VALUES ('$nom', '$cognom', '$dob', '$sexe', $altura)");
    }

    function consultarPersona($link, $letra)
    {
        $sentencia = $link->prepare("select * from `persona` WHERE nom LIKE :letra");
        $letra = "%" . $letra . "%";
        $sentencia->bindParam(':letra', $letra);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_CLASS, "Persona");
        return $resultado;
    }

    function consultarSexes($link)
    {
        $sexes = array();
        $sentencia = $link->prepare("SELECT * FROM `persona`");
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_CLASS, "Persona");
        $contM = 1;
        $contF = 1;

        foreach ($resultado as $persona) {
            if ($persona->getSexe() == "Masculino") {
                $sexes[0] = $contM;
                $contM++;
            } else {
                $sexes[1] = $contF;
                $contF++;
            }
        }
        return $sexes;
    }

    function consultarAlturas($link)
    {
        $alturas = array(0, 0, 0, 0, 0, 0);
        $sentencia = $link->prepare("SELECT * FROM persona");
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_CLASS, "Persona");
        foreach ($resultado as $persona) {
            $altura = $persona->getAltura();
            switch ($altura) {
                case $altura >= 150 && $altura < 160 :
                    $alturas[0]++;
                    break;
                case $altura >= 160 && $altura < 170:
                    $alturas[1]++;
                    break;
                case $altura >= 170 && $altura < 180:
                    $alturas[2]++;
                    break;
                case $altura >= 180 && $altura < 190:
                    $alturas[3]++;
                    break;
                case $altura >= 190 && $altura < 200:
                    $alturas[4]++;
                    break;
                case $altura >= 200:
                    $alturas[5]++;
                    break;
            }
        }
        return $alturas;
    }
}

?>
