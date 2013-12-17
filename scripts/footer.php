<?php
    include_once("scripts/helpers.php");
    
    function foot() {
        $class1 = '<div class="footer">'."\n";
        $class2 = '</div>'."\n";
        $text = "<p>&copy; Pencil AG ".getDateY().'</p>'."\n";
        return $class1.$text.$class2;
    }
?>
