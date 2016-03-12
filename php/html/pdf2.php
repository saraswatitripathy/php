<?php
require('fpdf/fpdf.php');
require('makefont/makefont.php');


$db_host = '127.9.88.2';
$db_name = 'php';
$db_user = 'admincaevTuC';
$db_pass = 'rRsJYwkR-2P2';
$connect = new mysqli ($db_host, $db_user, $db_pass, $db_name);

$pdf=new FPDF('L');

$pdf->Open();
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

class PDF extends FPDF
{

function Header()
{
 
    $this->Image('img/images.png',10,6,30);
    
    $this->SetFont('Arial','B',15);

    $this->Cell(70);

    $this->Cell(60,7,'Employee Detail',0,0,'');

    $this->Ln(20);
}

function Footer()
{

    $this->SetY(-15);

    $this->SetFont('Arial','I',8);

    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
for($i=1;$i<=40;$i++)

$y_axis= 28;

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 10);
$pdf->SetY(20);
$pdf->SetX(8);
$pdf->Cell(25, 10, 'EMPLOYEE ID', 1, 0, 'L', 1);
$pdf->Cell(35, 10, 'EMPLOYEE NAME', 1, 0, 'L', 1);
$pdf->Cell(35, 10, 'DATE OF JOINING', 1, 0, 'L', 1);
$pdf->Cell(35, 10, 'DATE OF LEAVING', 1, 0, 'L', 1);
$pdf->Cell(30, 10, 'DESIGNATION', 1, 0, 'L', 1);
$pdf->Cell(30, 10, 'DEPARTMENT', 1, 0, 'L', 1);

$y_axis = $y_axis + $row_height;
$result=mysqli_query($connect, "SELECT empid,empname,doj,dol,mas_designation.designation,mas_department.department
        FROM  php.mas_employee
        left join mas_designation on mas_employee.designation_id=organization_detail.mas_designation.id
        left join mas_department on mas_employee.department_id=organization_detail.mas_department.id 
        ORDER BY empid");
$i = 0;
$max = 25;

$row_height = 9;

while($row = mysqli_fetch_array($result))
{
    if ($i == $max)
    {
        $pdf->AddPage();

  
        $pdf->SetY(20);
        $pdf->SetX(8);
        $pdf->Cell(25, 10, 'EMPLOYEE ID', 1, 0, 'L', 1);
        $pdf->Cell(35, 10, 'EMPLOYEE NAME', 1, 0, 'L', 1);
        $pdf->Cell(35, 10, 'DATE OF JOINING', 1, 0, 'R', 1);
        $pdf->Cell(35, 10, 'DATE OF LEAVING', 1, 0, 'R', 1);
        $pdf->Cell(30, 10, 'DESIGNATION', 1, 0, 'R', 1);
        $pdf->Cell(30, 10, 'DEPARTMENT', 1, 0, 'R', 1);
       
       
        $y_axis = $y_axis + $row_height;

        
        $i = 0;
    }

           $empname = $row['empname'];
           $empid=$row['empid'];
           $doj=$row['doj'];
           $dol=$row['dol'];
           $designation=$row['designation'];
           $department=$row['department'];

    $pdf->SetY($y_axis);
    $pdf->SetX(8);
   
    $pdf->Cell(25, 10, $empid, 1, 0, 'L', 1);
    $pdf->Cell(35, 10, $empname, 1, 0, 'L', 1);
    $pdf->Cell(35, 10, $doj, 1, 0, 'L', 1);
    $pdf->Cell(35, 10, $dol, 1, 0, 'L', 1);
    $pdf->Cell(30, 10, $designation, 1, 0, 'L', 1);
    $pdf->Cell(30, 10, $department, 1, 0, 'L', 1);


   
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

mysqli_close($connect);
$pdf->Output();
?> 