<?php
	session_start();
?>
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
                
                echo 'Source : This is a simple test. ==> Target : ';
                echo _('This is a simple test');
                echo ' ('.$locale.')';
                echo '<br/>';
                echo 'Source : Good morning ==> Target : ';
                echo _('Good morning');
                echo ' ('.$locale.')';
                echo '<br/>';
                echo 'Source : Good night ==> Target : ';
                echo _('Good night');
                echo ' ('.$locale.')';
            ?>
            </p>
            <h3>Switch language</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="col-md-8">
					<div class="col-md-4">
						<label class="col-lg-10 control-label">Language selection:</label>
					</div>

					<div class="col-lg-2">
						<select class="form-control input-sm" name="lang">
							<option value="de_CH">de</option>
                            <option value="fr_FR">fr</option>
                            <option value="en_US">en</option>
						</select>
					</div>

					<div class="col-lg-2">
						<button class="btn btn-default" type="submit">Switch language</button>
					</div>
				</div>
            </form>
            <br/>
            <br/>
            <?php
                echo "Selected language: ".$_POST['lang'];
                echo "<br/>"."\n";
                $_SESSION["SESSION_LANG"] = $_POST['lang'];
                echo "Language in session: ".$_SESSION["SESSION_LANG"];
                echo "<br/>"."\n";
                echo "<br/>"."\n";

                $locale = $_POST['lang'];
                putenv('LANG='.$locale);
                setlocale(LC_ALL, $locale);
                $domain = 'webshop';
                bindtextdomain($domain, 'locale');
                bind_textdomain_codeset($domain, 'UTF-8');
                textdomain($domain);
                
                echo 'Source : This is a simple test. ==> Target : ';
                echo _('This is a simple test');
                echo ' ('.$locale.')';
                echo '<br/>';
                echo 'Source : Good morning ==> Target : ';
                echo _('Good morning');
                echo ' ('.$locale.')';
                echo '<br/>';
                echo 'Source : Good night ==> Target : ';
                echo _('Good night');
                echo ' ('.$locale.')';
            ?>
            <br/>
            <br/>
            <?php
                // All available languages
                $languages = array('de_CH', 'fr_FR', 'en_US');
                foreach ($languages as $lang) {
                    echo "<a href=\"javascript:document.".$lang.".submit();\">".substr($lang, 0, 2)."</a> "."\n";
                }
                // Create hidden form for language selection
                foreach ($languages as $lang) {
                    echo "<form action=".$_SERVER['PHP_SELF']." method=\"GET\" name=\"$lang\">"."\n";
                    echo "<input type=\"hidden\" name=\"lang\" value=\"$lang\"/>"."\n";
                    echo "</form>"."\n";
                }
                $_SESSION["SESSION_LANG"] = $_GET['lang'];
                $locale = $_GET['lang'];
                putenv('LANG='.$locale);
                setlocale(LC_ALL, $locale);
                $domain = 'webshop';
                bindtextdomain($domain, 'locale');
                bind_textdomain_codeset($domain, 'UTF-8');
                textdomain($domain);

                echo 'Source : This is a simple test. ==> Target : ';
                echo _('This is a simple test');
                echo ' ('.$locale.')';
                echo '<br/>';
                echo 'Source : Good morning ==> Target : ';
                echo _('Good morning');
                echo ' ('.$locale.')';
                echo '<br/>';
                echo 'Source : Good night ==> Target : ';
                echo _('Good night');
                echo ' ('.$locale.')';
            ?>
            <br/>

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
