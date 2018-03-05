<?php

/**
 * Created by PhpStorm.
 * User: Xavibana
 * Date: 05/02/2018
 * Time: 17:56
 */
class BBDD
{
    function connect()
    {
        $link = mysqli_connect("127.0.0.1", "root", "", "persona");
        if (mysqli_connect_errno()) {
            exit(mysqli_connect_error());
        }
        return $link;
    }

    function disconnect($link)
    {
        mysqli_close($link);
    }

//Conexiones con PDO!!!!!!!!!!!


    function conectar($host, $dbname, $user, $pass)
    {
        try {
            $bd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            return $bd;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    function desconectar($bd)
    {
        $bd = null;
    }
}

?>