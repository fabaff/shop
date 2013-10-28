<?php
//    include('variables.php');    

    function foot() {
        global $company;
        echo $company;
        $class1 = '<div class="footer">'."\n";
        $class2 = '</div>'."\n";
        $text = "<p>&copy; Pencil AG ".getYear().'</p>'."\n";
        return $class1.$text.$class2;
    }

    function getYear(){
        return date("Y");
    }
?>    
