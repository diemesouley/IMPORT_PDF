<?php
if($_POST){
    require('fpdf182/fpdf.php');
    $name = $_POST['usname'];
    $ageP = $_POST['age'];
    $adresseP = $_POST['adresseP'];
    $dob = $_POST['dob'];
    $job = $_POST['job'];
    $consultation = $_POST['consultation'];
    $efr = $_POST['efr'];
    $tstA = $_POST['tstA'];
    $aut1 = $_POST['aut1'];
    $aut2 = $_POST['aut2'];
    $aut3 = $_POST['aut3'];
    $rythmAD1 = $_POST['rythmAD1'];
    $rythmAD2 = $_POST['rythmAD2'];
    $rythmAD3 = $_POST['rythmAD3'];
    $rythmAD4 = $_POST['rythmAD4'];
    $rythmAD5 = $_POST['rythmAD5'];
    $rythmAD6 = $_POST['rythmAD6'];
    $dateRDV = $_POST['dateRDV'];
    $title = 'OrdONNANCE';
    $telDoc = '77 511 44 17';


    //Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');
$h = 7;
$retrait = "      ";
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
$pdf->Cell(50, 5, 'Nom: ' .$name , 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(80, 5, "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".'Tél: ' .$telDoc);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 5, 'Age: ' .$dob ." ans" , 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(80, 5, "\t\t\t\t\t\t\t\t\t\t".'DAKAR (Sénégal)');

$pdf->Cell(50, 5, '', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(80, 5, "\t".'Email: agnepsel@gmail.com'."\n");


// entete
// $pdf->Image('en-tete.png', 10, 5, 130, 20);

// Saut de ligne
$pdf->Ln(18);


// Police Arial gras 16
$pdf->SetFont('Arial', 'BIU', 16);

// Titre
$pdf->Cell(0, 10, ' ORDONNANCE ', '', 1, 'C');
//$pdf->Cell(0, 10, 'N°:', 0, 1, 'C');

// Saut de ligne
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $consultation ."\n");
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(10);
$pdf->Write($h, $retrait . $rythmAD1 ."\n");
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $efr ."\n");
$pdf->Cell(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $rythmAD2 ."\n");
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $tstA ."\n");
$pdf->Cell(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $rythmAD3 ."\n");
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $aut1 ."\n");
$pdf->Cell(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $rythmAD4 ."\n");
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $aut2 ."\n");
$pdf->Cell(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $rythmAD5 ."\n");
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $aut3 ."\n");
$pdf->Cell(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait . $rythmAD6 ."\n");
$pdf->Ln(8);

$pdf->Cell(23, 5, '');

// Police Arial gras 16
$pdf->SetFont('Arial', 'I', 8);

//$pdf->Cell(10);
$pdf->Cell(80, 8, "Date du prochain rendez vous le :  " . $dateRDV , 1, "C");// .'1', 'C'); //fin de ligne



// Début en police Arial normale taille 10

//$pdf->SetFont('Arial', '', 10);


//$pdf->Write($h, "Je soussigné, Dr P.S AGNE du cabinet médical que : \n");

//$pdf->Write($h, $retrait . "Le(ou la) Patient(e) : ");

//Ecriture en Gras-Italique-Souligné(U)
//$pdf->SetFont('', 'BIU');
//$pdf->Write($h, $name . "\n");

//Ecriture normal
//$pdf->SetFont('', '');

//$pdf->Write($h, $retrait . "Agé(e) de  : " . $dob." ans". " Habitant à : " . $job . "\n");

//$pdf->Write($h, $retrait . "N° Tel: " . $telP . " \n");

//$pdf->Write($h, $retrait . "1. Consultation : " . $consultation ." \n");

//$pdf->Write($h, $retrait . "2. EFR : " . $efr . " \n");

//$pdf->Write($h, $retrait . "3. Tests d'allergie :  " . $tstA . " \n");

//$pdf->Write($h, $retrait . "4. Autres :  " . $aut1 . "  \n");

//$pdf->Write($h, $retrait . "5. Autres :  " . $aut2 . " \n");

//$pdf->Write($h, $retrait . "Année de formation :  " . $dob . "  \n");

//$pdf->Write($h, "Poursuit ses étude en  " . $job . "   et cela pour l'année scolaire en cours  " . $dob . "  \n");

//$pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

//$pdf->Cell(0, 5, 'Fait à Dakar Le : ' . date('d/m/Y'), 0, 1, 'C');

// Décalage de 20 mm à droite
//$pdf->Cell(20);
//$pdf->Cell(80, 8, "Le directeur du cabinet médical", 1, 1, 'C');

// Décalage de 20 mm à droite
//$pdf->Cell(20);
//$pdf->Cell(80, 5, "Dr PAPA SAMBA AGNE", 'LR', 1, 'C');
//$pdf->Cell(20);
//$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
//$pdf->Cell(20);
//$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
//$pdf->Cell(20);
//$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
//$pdf->Cell(20);
//$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)
    $pdf->Output();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INFOS ORDONANCE </title>
        <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="main-block">
        <div class="header">
            INFOS ORDONNANCE
        </div>
        <div class="body">
            <form action='' method="POST">
                <input type="text" name="usname" placeholder="Nom complet" required>
                <input type="text" name="dob" placeholder="Age" >
                <input type="text" name="consultation" placeholder="1ére prescription" required>
                <input type="text" name="rythmAD1" placeholder="Rythme d'administration" required>
                <input type="text" name="efr" placeholder="2éme Prescription">
                <input type="text" name="rythmAD2" placeholder="Rythme d'administration" >
                <input type="text" name="tstA" placeholder="3éme pPrescription">
                <input type="text" name="rythmAD3" placeholder="Rythme d'administration" >
                <input type="text" name="aut1" placeholder="4éme Prescription" >
                <input type="text" name="rythmAD4" placeholder="Rythme d'administration" >
                <input type="text" name="aut2" placeholder="5éme Prescription" >
                <input type="text" name="rythmAD5" placeholder="Rythme d'administration" >
                <input type="text" name="aut3" placeholder="6éme Prescription" >
                <input type="text" name="rythmAD6" placeholder="Rythme d'administration" >
                <input type="text" name="dateRDV" placeholder="Date prochain RDV" >
                <input type="submit" value="Générer Ordonnance">
            </form>
        </div>
        <div class="footer">
            <p>Déployer par diemesouley @<a href="https://diemesouley@gmail.com" target="_blank">me contacter au 771208795</a></p>
        </div>
    </div>
</body>
</html>