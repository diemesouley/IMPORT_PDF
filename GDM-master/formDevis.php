<?php
if (!empty($_POST['submit'])) {
   
    require("fpdf182/fpdf.php");
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->output();

}

?>