<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Graphics'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Check availability of GD support</h3>
<p>
    <?php
        if (!function_exists("GD")){
            echo "GD is not installed\n";
        }
        else{
            echo "GD is supported\n";
        }
        echo "<br/>"."\n";
        echo "Supported image type: ".imagetypes();
    ?>
</p>
<h3>Check drawing capability</h3>
<p>
    <img src="scripts/blackbox.php" />
</p>

<h3>Scaling</h3>
tbd
<!--<?php
//    require('scripts/graphics.php');
    echo scaling('images/default.png', 3);
?>-->
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
