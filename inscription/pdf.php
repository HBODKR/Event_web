<?php

$host ="localhost";  
$user ="root";
$bd = "elspace";
$password  ="";
$c=mysqli_connect($host,$user,$password) or die("erreur connexion !!");
mysqli_select_db($c,$bd) or die("erreur au base de donne !!");

require('fpdf.php');
$pdf=new FPDF();
$pdf->SetTopMargin(50);
$pdf->AddPage();
$pdf->SetFont('Arial','B','7');
$pdf->SetTopMargin(50);
$pdf->Image("logo.jpg",90,10,30,28);
$pdf->cell(193,7,"Participant :",1,1,"C");

$pdf->cell(26,7,"Date :",1,0);
$pdf->cell(7,7,"Id :",1,0);
$pdf->cell(28,7,"Nom et prenom :",1,0);
$pdf->cell(35,7,"Email :",1,0);
$pdf->cell(14,7,"Tel :",1,0);
$pdf->cell(20,7,"Poste Actuel :",1,0);
$pdf->cell(35,7,"Specialite :",1,0);
$pdf->cell(28,7,"Interesse par :",1,1);


 $rq=mysqli_query($c,"select * from particpant");
                    while($rq1=mysqli_fetch_assoc($rq))
                    {
                       $pdf->cell(26,5,$rq1['Time'],1,0);
                       $pdf->cell(7,5,$rq1['Id'],1,0);
                       $pdf->cell(28,5,$rq1['Nom_pre'],1,0);
                       $pdf->cell(35,5,$rq1['Email'],1,0);
                       $pdf->cell(14,5,$rq1['Tel'],1,0);
                       $pdf->cell(20,5,$rq1['Poste'],1,0);
                       $pdf->cell(35,5,$rq1['Specialite'],1,0);
                       $pdf->cell(28,5,$rq1['Interesse'],1,1);     
                    }


$pdf->output();

?>