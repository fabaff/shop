<?php
    require('scripts/page-elements.php');
?>
<?php getStart('About'); ?>
<!-- Place javascript here ---------------------------------------------------->
    <link href="css/leaflet.css" rel="stylesheet"/>
<!---------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ---------------------------->
This is a multi-language page, please chosse your language: 
<?php setLanguage() ?>

<div class="row">
    <div class="col-md-6">
    <!-- Address -->
        <?php
            echo "<h3>";
            echo _('Address');
            echo "</h3>";
            $content = file_get_contents('company.txt');
            echo $content;
        ?>
</div>
<div class="col-md-6">
    <!-- Weather -->
        <?php 
            require('scripts/openweathermap.php');
        ?>
    </div>
</div>
    <!-- Map -->
    <?php
        echo "<h3>";
        echo _('Map');
        echo "</h3>";
        echo "<div id=\"map\" class=\"map\" style=\"width: 600px; height: 400px\"></div>";
        echo "<script src=\"scripts/leaflet.js\"></script>";
        echo "<script src=\"scripts/leaflet-providers.js\"></script>";
        echo "<script src=\"scripts/leaflet-osm.js\"></script>";
    ?>
<!---------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here --------------------------------------------------->

<!---------------------------------------------------------------------------->
<?php getEnd(); ?>
