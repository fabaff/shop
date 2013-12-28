<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Localisation</title>

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
            <h3>Check availability of L10n support</h3>
            <p>
            <?php
                if (!function_exists("gettext")){
                    echo "gettext is not installed\n";
                }
                else{
                    echo "gettext is supported\n";
                }
            ?>
            </p>
            <h3>Check translations</h3>
            <p>
            <?php
                $locale = 'de_CH';
                putenv('LANG='.$locale);
                setlocale(LC_ALL, $locale);
                $domain = 'webshop';
                bindtextdomain($domain, 'locale');
                bind_textdomain_codeset($domain, 'UTF-8');
                textdomain($domain);
                
                echo 'Source : Good morning ==> Target : ';
                echo _('Good morning');
                echo ' ('.$locale.')';
                echo '<br/>';
                echo 'Source : Good night ==> Target : ';
                echo _('Good night');
                echo ' ('.$locale.')';
            ?>
            </p>
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
