<?php
    /**
     * Get the year.
     *
     * @param String Image file
     * @param Int factor
     * @return image
     */
    function scaling($image_file, $factor) {
        $source = imagecreatefromjpeg($image_file);
        $width = imagesx($source);
        $height = imagesy($source);
        $x = $width / $factor;
        $y = $height / $factor;

        $destination = imagecreatetruecolor($x, $y);
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $x, $y, $width, $height);

        header("Content-Type: image/png");
        imagepng($destination);
    }
?>
