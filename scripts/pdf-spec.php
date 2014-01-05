<?php
    define('FPDF_FONTPATH','../font/');
    require('fpdf.php');
    require_once('../config/dbconnect.php');
    require_once('helpers.php');

    // Get the parameter
    $id = $_GET['id'];
    // Create SQL query
    // TODO: Fix this!
    $connection = new mysqli("localhost", "root", "webshop", "webshop");
    $sql = "SELECT products.pname AS name,
                products.pdesc AS description,
                pencils.type AS type,
                options.type AS option,
                colors.type AS color,
                hardness.type AS hardness,
                products.price AS price
                FROM products 
                    JOIN pencils ON products.ptype=pencils.id
                    JOIN options ON products.poption=options.id
                    JOIN colors ON products.color=colors.id
                    JOIN hardness ON products.hardness=hardness.id
                    WHERE products.id=$id";
    $results = $connection->query($sql);
    $result = $results->fetch_object();

    // Instanciation of inherited class
    $pdf = new FPDF('l', 'mm', 'A5');
    $pdf->AliasNbPages();
    $pdf->SetFont('Times', '', 12);
    $pdf->AddPage();

    // Header
    $pdf->SetX(10);
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(80, 0, 'Pencil AG | Musterstrasse 1 | 3000 Bern | pencil@webshop');
    $pdf->Ln(1);
    $pdf->SetFont('Times', 'B', 16);
    $pdf->Ln(10);
    $pdf->Image('../images/logo.png', 20, 20, 20);
    $pdf->Cell(180 , 20, 'Product specification sheet', 0, 0, 'C');
    $pdf->Ln(40);

    // Now show the 3 columns with the data
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(20, 6, $result->name, 0);
    $pdf->Cell(100, 6, $result->description, 0);
    $pdf->Cell(100, 6, $result->type, 0);

    // Footer
    $pdf->SetY(115);
    $pdf->SetFont('Times', '', 8);
    $pdf->Cell(0, 10, 'Page '.$pdf->PageNo().' of {nb} page(s)', 0, 0, 'C');

    $pdf->Output('product-specifications.pdf', 'I');
?>
