<?php
  function conectar(){
    try {
      $link  = new PDO("mysql:host=localhost;dbname=persona", "root", "");

    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $link;

  }

  function desconectar($link){
    $link = null;
  }

 ?>
