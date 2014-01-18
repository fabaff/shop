<?php
    require('scripts/page-elements.php');
?>
<?php getStart('Product details'); ?>
<!-- Place javascript here ---------------------------------------------------->
    <link href="css/webshop.css" rel="stylesheet">
<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h2><?php echo $this->eprint($this->heading); ?></h2>


<?php echo $this->eprint($this->content); ?>

<br />
<br />
<center><small>This page is using the Savant3 templating engine.</small></center>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
