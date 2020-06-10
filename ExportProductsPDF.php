<?php
require_once ('pdf/fpdf.php');
require_once "includes/helpers.inc.php";

$connect = Connection::getInstance();
$conn = $connect->getConnection();
class PDF extends FPDF
{
    // Page header
    function Header()
    {   $this->Image('images/PDFLogo.png',10,5,25);
        $this->SetFont('Arial','B',20);
        $this->Cell(100);
        $this->Cell(50,10,'Products',1,0,'C');
        $this->Ln(25);
    }
    function Footer()
    {   $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable()
    {   $this->SetFont('Times','B',12);
        $this->cell(10,10,'ID',1,0,'C');
        $this->cell(28,10,'Categroy ID',1,0,'C');
        $this->cell(35,10,'Name',1,0,'C');
        $this->cell(40,10,'Expiration Date',1,0,'C');
        $this->cell(30,10,'Quantity',1,0,'C');
        $this->cell(30,10,'Price',1,0,'C');
        $this->cell(110,10,'Description',1,0,'C');
        $this->ln();
    }
    function ViewTable($conn)
    {    $this->SetFont('Times','B',12);
        $stmt = $conn->prepare("select * from Product");
        $stmt->execute();
        while ($data = $stmt->fetch(PDO::FETCH_OBJ))
        {   $this->cell(10,10,$data->Id,1,0,'C');
            $this->cell(28,10,$data->CategoryID,1,0,'L');
            $this->cell(35,10,$data->Name,1,0,'L');
            $this->cell(40,10,$data->Expiration,1,0,'L');
            $this->cell(30,10,$data->Quantity,1,0,'L');
            $this->cell(30,10,$data->Price,1,0,'L');
            $this->cell(110,10,$data->Description,1,0,'L');
            $this->ln();
        }      
    }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->ViewTable($conn);
$pdf->Output();




?>