<?php
    include("scripts/ShoppingCart.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Billing/Registration</title>

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
        <h3>Shopping cart</h3>
        <div width="90%">
            <?php 
                $_SESSION["cart"]->displayCart();
            ?>
                </div>
<a class="btn btn-success" href="scripts/pdf-cart.php" role="button">Registration/signup and login for customers is not implemented. Please print your confirmation.</a>

<table>
<tr>
<td width="65%">

        <h3>Registration for customers</h3>
            <!-- Don't go through the signup process -->
            <!--<form action="scripts/signup-process.php" class="form-horizontal well" method="POST">-->
            <form action="scripts/pdf-cart.php" class="form-horizontal well" method="POST">
            <fieldset>
                    <div class="rows">
                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="username">Username</label>
                            <input class="form-control" id="username" name="username" placeholder="Your username" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="firstname">Firstname</label>
                                <input class="form-control" id="firstname" name="firstname" placeholder="First Name" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="lastname">Lastname</label>
                            <input class="form-control" id="lastname" name="lastname" placeholder="Last Name" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="email">Email address</label>
                            <input class="form-control" id="email" name="email" placeholder="Your Email address" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="reemail">Re-enter Email address</label>
                            <input class="form-control" id="reemail" name="reemail" placeholder="Re-enter Email address" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="password1">Re-enter Password</label>
                            <input class="form-control" id="password1" name="password1" placeholder="Re-enter Password" type="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label class="col-lg-3 control-label">Birthday</label>

                            <div class="col-lg-3">
                                <select class="form-control input-sm" name="month">
                                    <option>Month</option>
                                    <?php
                                        $m = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                                        foreach ($m as $month) {
                                            echo '<option value='.$month.'>'.$month.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control input-sm" name="day">
                                    <option>Day</option>
                                <?php 
                                    $days = range(31, 1);
                                    foreach ($days as $day) {
                                        echo '<option value='.$day.'>'.$day.'</option>';
                                    }
                                ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control input-sm" name="year">
                                    <option>Year</option>
                                <?php 
                                    $years = range(2013, 1950);
                                    foreach ($years as $year) {
                                        echo '<option value='.$year.'>'.$year.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label class="col-lg-3 control-label">Gender</label>
                            <div class="col-md-4">
                                <div class="radio" id="goptions">
                                    <label><input checked id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female</label>
                                </div>
                            </div>

                            <div class="col-md-4">
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
                            <div class="col-lg-4">
                                <button class="btn btn-default" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div>
                    
                </div>    
                </fieldset>
            </form>
</td>
<td>
            <h3>Login for already registered users</h3>

            <form role="form" action="scripts/login1-process.php" name="login" onsubmit="return validateForm()" class="form-horizontal well" method="POST">
            <fieldset>
                    <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="username">Username</label>
                            <input class="form-control" id="username" name="username" placeholder="User name" type="text" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-8">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" placeholder="Password" type="password" />
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
                </fieldset>
            </form>
</td>
</tr>
</table> 
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
