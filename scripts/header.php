<?php
    function head() {
        $start_page = "index.php";
        $part1 = "<div>\n";
        $part2 = "\t<a class='brand-logo' href='".$start_page."'></a>\n";
        $part3 = "\t<p class='brand-name'>Webshop Pencil AG</p>\n";
        $part4 = "</div>\n";
        return $part1.$part2.$part3.$part4;
    }
?>
