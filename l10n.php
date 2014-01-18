<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Localisation'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Get browser language</h3>
<p>
    <?php
        $language = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        echo "Your browser is using: ".$language[0];
    ?>
</p>
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
<h3>Check translations (hard-coded)</h3>
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
<!-- Dropdown is too big
<?php
    if (isset($_POST['lang-selection'])) {
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
    } else {
        $form = "<form action=\"l10n.php\" method=\"POST\" name=\"lang-selection\">
            <div class=\"col-md-8\">
                <div class=\"col-md-4\">
                    <label class=\"col-lg-10 control-label\">Language selection:</label>
                </div>

                <div class=\"col-lg-2\">
                    <select class=\"form-control input-sm\" name=\"lang\">
	                    <option value=\"de_CH\">de</option>
                        <option value=\"fr_FR\">fr</option>
                        <option value=\"en_US\">en</option>
                    </select>
                </div>

                <div class=\"col-lg-2\">
                    <button class=\"btn btn-default\" type=\"submit\">Switch language</button>
                </div>
            </div>
        </form>
        <br/>
        <br/>";
        echo $form."\n";
    }
?>
<br/>-->
<?php
    if (isset($_POST['lang'])) {
        echo 'The selection was: '. $_POST['lang'].'<br/>';
        $locale = $_POST['lang'];
        $_SESSION["SESSION_LANG"] = $locale;
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
        echo '<br/>';
    } else {
        // All available languages
        $languages = array('de_CH', 'fr_FR', 'en_US');
        foreach ($languages as $lang) {
            echo "<a href=\"javascript:document.".$lang.".submit(); \">".substr($lang, 0, 2)."</a> "."\n";
        }
        // Create hidden form for language selection
        foreach ($languages as $lang) {
            echo "<form action=".$_SERVER['PHP_SELF']." method=\"POST\" name=\"$lang\">"."\n";
            echo "<input type=\"hidden\" name=\"lang\" value=\"$lang\"/>"."\n";
            echo "</form>"."\n";
        }
    }
?>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
