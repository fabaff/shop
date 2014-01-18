<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Register new user'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Register a new user</h3>

<form name="register" action="scripts/register-process.php" method="post">
    <table width="510" border="0">
        <tr><td colspan="2"></td></tr>
        <tr>
            <td>User name:</td>
            <td><input class="form-control" type="text" name="username" maxlength="20" /></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input class="form-control" type="password" name="password1" /></td>
        </tr>
        <tr>
            <td>Password again:</td>
            <td><input class="form-control" type="password" name="password2" /></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input class="form-control" type="text" name="email" id="email" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button class="btn btn-default" type="submit" value="Register">Register</button></td>
        </tr>
    </table>
</form>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
