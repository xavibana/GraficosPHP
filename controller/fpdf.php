<?php
require_once '../model/BDPersona.php';
require_once '../Librerias/fpdf/fpdf.php';
require_once './persona.php';

class PDF extends FPDF
{
    private $letra;


    public function setLetra($letra)
    {
        $this->letra = $letra;
    }

    /**
     * @return mixed
     */
    public function getLetra()
    {
        return $this->letra;
    }

    public function generarPdf(){
        // Creación del objeto de la clase heredada
        //creamos objeto
        // $this = new PDF();
        //$this->set("b");
        $bd=new BDPersona();
        $link=$bd->conectar("127.0.0.1", "persona", "root", "");
        $personas = $bd->consultarPersona($link,$this->getLetra());

        //añadimos una página
        $this->AddPage();
        //seteamos la fuente y su tamaño
        $this->SetFont('Arial', 'B', 12);
        //printamos datos personas
        $this->SetTextColor(33, 97, 140);
        $this->SetDrawColor(241, 196, 15);

        $this->Cell(45,10, 'Datos personas', 0, 0, 'L');
        $this->Ln();

        $this->Cell(32, 10, "Nombre", 1, 0, 'C');
        $this->Cell(32, 10, "Apellido", 1, 0, 'C');
        $this->Cell(32, 10, "Fnac", 1, 0, 'C');
        $this->Cell(32, 10, "Edad", 1, 0, 'C');
        $this->Cell(32, 10, "Sexo", 1, 0, 'C');
        $this->Cell(32, 10, "Altura", 1, 0, 'C');
        $this->Ln();

        foreach($personas as $persona) { 
            //$persona = $datosP['persona' . $i];
            //$this->Cell(10, 10, $i + 1, 1, 0, 'C');
            $this->Cell(32, 10, $persona->getNom(), 1, 0, 'C');
            $this->Cell(32, 10, $persona->getCognom(), 1, 0, 'C');
            $this->Cell(32, 10, $persona->getDob(), 1, 0, 'C');
            $this->Cell(32, 10, $persona->decirEdad(), 1, 0, 'C');
            $this->Cell(32, 10, $persona->getSexe(), 1, 0, 'C');
            $this->Cell(32, 10, $persona->getAltura(), 1, 0, 'C');
            $this->Ln();
        }
        //cerramos el archivo
        $bd->desconectar($link);
        $this->Output();}
}
?>
