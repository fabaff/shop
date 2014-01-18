<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
    setcookie("Check", "yes", time() + 10, "/", $_SERVER['SERVER_NAME'], true, true);
?>
<?php getStart('Cookies'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Cookies</h3>
    <h4>Check Browser-Support</h4>
    <p>
    <?php
        if (isset($_COOKIE['Check'])) {
            echo "You have been on this page in the last 10 s.";
        } else {
            echo "You have not been on this page in the last 10 s.";
        }
    ?>
    </p>
    <a class="btn btn-link" href="<?php echo $_SERVER['PHP_SELF']; ?>">Check it.</a>

    <h4>Read all cookies and their values</h4>
    <div class="panel panel-default" style="margin: 10px; padding: 10px; border: 1px solid black;">
        <?php
            if(!empty($_COOKIE)) {
                foreach($_COOKIE as $key => $value) {
                    echo "<p>".$key." : ".$value."</p>";
                }
            } else {
                echo 'There are no cookies configured for this website so far.';
            }
        ?>
    </div>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
