<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop <?php echo $this->eprint($this->company); ?> for Pencils">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop <?php echo $this->eprint($this->company); ?> | <?php echo $this->eprint($this->title); ?></title>

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
    <h2><?php echo $this->eprint($this->heading); ?></h2>
    <?php echo $this->eprint($this->content); ?>
    <br />
    <br />
    <center><small>This page is using the Savant3 templating engine.</small></center>
    <!-- Content -->
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php 
        require('scripts/footer.php');
        echo foot();
    ?>
    </div>
  </body>
</html>
