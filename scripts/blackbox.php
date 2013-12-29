<?php
    $width = 400;
    $height = 100;

    $image = imagecreatetruecolor($width, $height);
    // Colors
    $black = imagecolorallocate($image, 0, 0, 0);
    $white = imagecolorallocate($image, 255, 255, 255);
    $red = imagecolorallocatealpha($image, 255, 50, 0, 63);
    $gray = imagecolorallocatealpha($image, 70, 70, 70, 63);

    // Draw a line (imageline or imagedashedline)
    imagedashedline($image, 120, 30, 360, 60, $red);
    // Draw a rectangle
    imagerectangle($image, 10, 10, $width-10, $height-10, $white);
    // Draw a filled rectangle
    imagefilledrectangle($image, 380, 40, 100, 80, $gray);
    // Circle
    imagefilledellipse($image, 50, 40, 50, 50, $red);
    // Add a string
    imagestring($image, 4, 20, $height - 30, "A dynamically generated image", $white);

    header("Content-Type: image/png");
    imagejpeg($image);
?>
