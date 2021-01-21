<?php
if($_POST){
    require('fpdf182/fpdf.php');
    $prenomP = $_POST['prenomP'];
    $name = $_POST['usname'];
    $sexeP = $_POST['sexeP'];
    $adresseP = $_POST['adresseP'];
    $telP = $_POST['telP'];
    $dob = $_POST['dob'];
    $job = $_POST['job'];
    $telDoc = '77 511 44 17';
    $renCl = $_POST['rencl'];
    $exDem = $_POST['exDem'];
    $title = 'BILAN';

    //Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

//police taille 
$pdf->SetFont('Arial', 'BI', 14);

//Pour les cellules (largeur, hauteur, texte, bordur, ...)
$pdf->Cell(80, 5, 'Dr Papa Samba E. AGNE');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 5, 'Date : ' . date('d/m/Y'), 0, 1, 'C');//fin de ligne

//police taille
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(80, 5, "\t\t\t\t\t\t\t\t\t\t".'Pneumo - Allergologue - Urgentiste');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 5, '');

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(80, 5, "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".'Tél: ' .$telDoc);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 5, 'Age: ' .$dob ." ans" , 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(80, 5, "\t\t\t\t\t\t\t\t\t\t".'DAKAR (Sénégal)');

$pdf->Cell(50, 5, '', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(80, 5, "\t".'Email: agnepsel@gmail.com'."\n");

$h = 7;
$retrait = "      ";

$pdf->SetFont('Arial', 'BIU', 16);

// Titre
$pdf->Cell(0, 10, ' DEMANDE D\'EXAMEN ', '', 1, 'C');
//$pdf->Cell(0, 10, 'N°:', 0, 1, 'C');

// Saut de ligne
$pdf->Ln(8);

//police taille 
$pdf->SetFont('Arial', '', 12);

//Pour les cellules (largeur, hauteur, texte, bordur, ...)
$pdf->Cell(80, 5, 'Prénom:    '.$prenomP);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 5, 'Age:    ' . $dob ." ans", 0, 1, 'C');//fin de ligne

$pdf->Ln(2);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(80, 5, 'Nom:    '.$name);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 5, 'Sexe:    '. $sexeP, 0, 1, 'C');//fin de ligne

$pdf->Ln(2);

$pdf->SetFont('Arial', 'B', 12);

// Titre
$pdf->Cell(0, 10, ' RENSEIGNEMENTS CLINIQUES ', '', 1, 'C');

$pdf->Cell(20);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $renCl, 0, 1, 'C');
//$pdf->Cell(0, 10, 'N°:', 0, 1, 'C');

// Saut de ligne
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);

// Titre
$pdf->Cell(0, 10, ' EXAMEN(s) DEMANDE(s) ', '', 1, 'C');

$pdf->Cell(20);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait .   $exDem, 0, 1, 'C');






    $pdf->Output();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INFOS BILAN </title>
        <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="main-block">
        <div class="header">
            DEMANDE D'EXAMEN
        </div>
        <div class="body">
            <form action='' method="POST">
                <input type="text" name="prenomP" placeholder="Prénom" >
                <input type="text" name="usname" placeholder="Nom" >
                <input type="text" name="dob" placeholder="Age" >
                <input type="text" name="sexeP" placeholder="Sexe" >
                <label for="rencl">RENSEIGNEMENTS CLINIQUES:</label>
                <textarea name="rencl" rows="3" cols="50">
                
                </textarea><br>
                <label for="rencl">EXAMEN(s) DEMANDE(s)</label>
                <textarea center="center" name="exDem" rows="7" cols="50">
                
                </textarea>
                
                                 
                <input type="submit" value="Générer une demande d'éxamen">
            </form>
        </div>
        <div class="footer">
            <p>Déployer par diemesouley @<a href="https://diemesouley@gmail.com" target="_blank">me contacter au 771208795</a></p>
        </div>
    </div>
</body>
</html>