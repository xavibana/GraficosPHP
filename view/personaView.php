<?php
/**
 * Created by PhpStorm.
 * User: Xavibana
 * Date: 05/02/2018
 * Time: 17:14
 */
require_once 'Igu.php';

class personaView extends Igu
{

    public function FormAltaPersona()
    {
        echo '<form action="#" method="get">
					<label>COGNOM</label><input type="text" name="fCognom" required autofocus><br />
					<label>NOM</label><input type="text" name="fNom" required><br />
					<label>Data Naixement</label><input type="date" name="fDate" required><br />
					<label>Sexe</label><select name="fSexe" required>
					    <option>Tria una Opció</option>
					    <option value="Masculino">Masculino</option>
					    <option value="Femenino">Femenino</option>
                    </select><br />
                    <label>Alçada</label><input type="text" name="fAltura">
					<input type="submit" name="enviar">';
    }

    public function formConsulta()
    {
        echo '<form action="#" method="get">
            <label>Caracter a Buscar</label><input type="text" name="fCaracter" required autofocus><br>
            <input type="submit" name="enviar"></form> ';

    }

    public function mostrarResultats($personas)
    {
        echo '<h3>Resultats Coincidents</h3>';
        echo '<table><tr><td>Nom</td><td>Cognom</td><td>Naixement</td><td>Sexe</td><td>Alçada</td></tr>';
        foreach ($personas as $persona) {
            echo '<tr><td>' . $persona->getNom() . '</td><td>' . $persona->getCognom() . '</td><td>' . $persona->getDob() . '</td><td>' . $persona->getSexe() . '</td><td>' . $persona->getAltura() . '</td></tr>';
        }
        echo '</table><br /> <a href="busquedaPersona.php">Tornar a Buscar</a>';
    }
    public function mostrarBotons(){
        echo '<form method="get" action="#"><label>Gràfic per Sexes</label><input type="submit" name="sexes"><br /><label>Gràfic per Alçades</label><input type="submit" name="altura">';
    }
}