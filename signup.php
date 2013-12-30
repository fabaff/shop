<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Registration</title>

    <link href="css/webshop.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" style="margin-top: 10px;">
    <!-- Header -->
      <div class="panel panel-default">
        <div class="panel-body">
        <!-- Logo and company name -->
            <?php 
                require('scripts/header.php');
                echo head();
            ?>
        <!-- Navigation -->
            <?php 
                require('scripts/menu.php');
                echo menu();
            ?>
    <!-- Header -->

    <!-- Content -->
        <div>
            <h3>Registration for customers</h3>
			<form action="scripts/signup-process.php" class="form-horizontal well" method="post">
			<fieldset>
				 <div class="rows">
					<div class="col-xs-8">
				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-12">
								<input class="form-control" id="username" name="username" placeholder="Your username" type="text">
							</div>
						</div>
					</div>
				</div>

					<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-6">
								<input class="form-control" id="firstname" name="firstname" placeholder="First Name" type="text">
							</div>

							<div class="col-lg-6">
								<input class="form-control" id="lastname" name="lastname" placeholder="Last Name" type="text">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-12">
								<input class="form-control" id="email" name="email" placeholder="Your Email" type="text">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-12">
								<input class="form-control" id="reemail" name="reemail" placeholder="Re-enter Email" type="text">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-12">
								<input class="form-control" id="password" name="password" placeholder="Password" type="password">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<h4>
							<div class="col-md-3">
								<label class="col-lg-2 control-label">Birthday</label>
							</div>

							<div class="col-lg-3">
								<select class="form-control input-sm" name="month">
									<option>Month</option>
									<!--Populating the selectbox for Month -->
									<?php
										$m = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
										foreach ($m as $month) {
											echo '<option value='.$month.'>'.$month.'</option>';
										}
									?>
								</select>
							</div>

							<div class="col-lg-3">
								<select class="form-control input-sm" name="day">
									<option>Day</option>
									<!--Populating the selectbox for Day -->
								<?php 
									$d = range(31, 1);
									foreach ($d as $day) {
										echo '<option value='.$day.'>'.$day.'</option>';
									}
								?>
								</select>
							</div>

							<div class="col-lg-3">
								<select class="form-control input-sm" name="year">
									<option>Year</option>
									<!--Populating the selectbox for year -->
								<?php 
									$years = range(2013, 1950);
									foreach ($years as $yr) {
										echo '<option value='.$yr.'>'.$yr.'</option>';
									}
								?>
								</select>
							</div>
							</h4>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-4">
							<div class="col-lg-6">
								<div class="radio">
									<label><input checked id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female</label>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="radio">
									<label><input id="optionsRadios2" name="optionsRadios" type="radio" value="Male">Male</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-4">
								<button class="btn btn-xs btn-default" type="reset">Reset</button>
							</div>
							<div class="col-lg-8">
								<button class="btn btn-default" type="submit">Sign Up</button>
							</div>
						</div>
					</div>
				</div>
				
				</div>
					
				</div>	
				</fieldset>
			</form>
        </div>
        <!-- Content -->
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php 
        require('scripts/footer.php');
        echo foot();
    ?>
    <!-- Footer -->
  </body>
</html>
