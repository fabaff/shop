<?php
    require_once('scripts/Savant3.php');
    $tpl = new Savant3();

    // Define page elements
    $company = "Pencil AG";
    $title = "Terms and conditions";
    $heading = "Terms and conditions";
    $content = "Our conditions are the ususal one the our area of operation.
                We don't accept payments in stamps or sheeps.
               ";

    // Assign values to the Savant instance
    $tpl->company = $company;
    $tpl->title = $title;
    $tpl->heading = $heading;
    $tpl->content = $content;

    // Display a template using the assigned values
    $tpl->display('master.tpl.php');
?>
