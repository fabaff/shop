<?php
    require_once('scripts/cookie.php');
    require('scripts/page-elements.php');
    lastVisit('LastVisit', 3600);
?>
<?php getStart('Login'); ?>
<!-- Place javascript here ---------------------------------------------------->
<script language="javascript">
    function setBG() {
        if (document.forms["login"]["username"].style.backgroundColor = "#FF9999") {
            document.forms["login"]["username"].style.backgroundColor = "";
        }

        if (document.forms["login"]["password"].style.backgroundColor = "#FF9999") {
            document.forms["login"]["password"].style.backgroundColor = "";
            }
    }

    function setFocus() {
        document.forms["login"]["username"].focus();
    }

    function validateForm() {
        var username = document.forms["login"]["username"].value;
        if (username == null || username == "") {
            document.forms["login"]["username"].style.backgroundColor = "#FF9999";
            document.forms["login"]["username"].placeholder = "Please, your username!";
            document.forms["login"]["username"].focus();
            return false;
        }
        var password = document.forms["login"]["password"].value;
        if (password == null || password == "") {
            document.forms["login"]["password"].style.backgroundColor = "#FF9999";
            document.forms["login"]["password"].placeholder = "Please, your password!";
            document.forms["login"]["password"].focus();
            return false;
        }
        return true;
    }
</script>
<!---------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ---------------------------->
<h3>Login for Administration area</h3>

<form action="scripts/login-process.php" name="login" onsubmit="return validateForm()" class="form-horizontal well" method="POST">
	<fieldset>
	    <div class="rows">
			<div class="col-md-8">
			<div class="form-group">
			<div class="rows">
				<div class="col-md-8">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" name="username" placeholder="User name" type="text" onkeyup="setBG()" />
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="rows">
				<div class="col-md-8">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password" onkeyup="setBG()" />
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="rows">
				<div class="col-md-8">
				    <button id="loging" class="btn btn-default" type="submit">Login</button>
				</div>
			</div>
		</div>
		</div>
		</div>
		</fieldset>
	</form>
</div>
<!---------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here --------------------------------------------------->

<!---------------------------------------------------------------------------->
<?php getEnd(); ?>
