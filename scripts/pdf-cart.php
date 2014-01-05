<?php
    define('FPDF_FONTPATH','../font/');
    require('fpdf.php');
    require_once('../config/dbconnect.php');
    require_once('helpers.php');
    require_once('ShoppingCart.php');
	session_start();

	$cartArray = $_SESSION["cart"]->getArray();
    // Something to implement
	$firstName = "First name of the customer";
	$lastName = "Last name of the customer";
    $date = getDateYMD();

    // Instanciation of inherited class
    $pdf = new FPDF('p', 'mm', 'A4');
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
    $pdf->Cell(180 , 20, 'Order overview'.'  '.$date, 0, 0, 'C');
    $pdf->Ln(40);

    // Address area
    $pdf->SetX(10);
    $pdf->SetY(50);
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(80, 6, $firstName." ".$lastName, '');
    $pdf->Ln();
    $pdf->Cell(80, 6, 'Street and nuber', '');
    $pdf->Ln();
    $pdf->Cell(80, 6, 'Postal code and city', '');
    $pdf->Ln();

    // Set some initial values
    $y_axis_initial = 75;
    $row_height = 6;
    $max = 25;
    $i = 0;
    $totalp = 0;

    // Create table
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->SetY($y_axis_initial);
    $pdf->SetX(25);
    $pdf->Cell(10, 6, '#', 1, 0, 'C', 1);
    $pdf->Cell(30, 6, 'Name', 1, 0, 'L', 1);
    $pdf->Cell(80, 6, 'Description', 1, 0, 'L', 1);
    $pdf->Cell(10, 6, 'Qty', 1, 0, 'C', 1);
    $pdf->Cell(20, 6, 'Price', 1, 0, 'C', 1);
    $pdf->Cell(20, 6, 'Subtotal', 1, 0, 'C', 1);

    $y_axis = $y_axis_initial + $row_height;
    // TODO: Use the connection definded in the extenral file
    $connection = new mysqli("localhost", "root", "webshop", "webshop");

    foreach ($cartArray as $art=>$qty) {
        $sql = "SELECT * FROM products WHERE id='$art'";
        $results = $connection->query($sql);
        $result = $results->fetch_object();
        $pname = $result->pname;
        $description = $result->pdesc;
        $price = $result->price;
        $subtotal = $qty * $price;
        $totalp = $totalp + $subtotal;

        $pdf->SetFont('Times', '', 10);
        $pdf->SetY($y_axis);
        $pdf->SetX(25);
        $pdf->Cell(10, 6, $i, 1, 0, 'C', 1);
        $pdf->Cell(30, 6, $pname, 1, 0, 'L', 1);
        $pdf->Cell(80, 6, $description, 1, 0, 'L', 1);
        $pdf->Cell(10, 6, $qty, 1, 0, 'C' , 1);
        $pdf->Cell(20, 6, $price, 1, 0, 'C' , 1);
        $pdf->Cell(20, 6, $subtotal, 1, 0, 'C', 1);

        // Go to next product
        $y_axis = $y_axis + $row_height;
        $i = $i + 1;
    }
    $pdf->Ln(2);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->SetY($y_axis + 5);
    $pdf->Cell(180, 5, 'Total price: '.$totalp.' CHF', 0, 0, 'R');
    $pdf->Output('order.pdf', 'I');
?>
