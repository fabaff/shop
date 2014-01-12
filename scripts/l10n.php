<?php
    // This is setting the locale to use.
    require_once('helpers.php');

    $language = getLanguage();
    if (!empty($_SESSION['SESSION_LANG'])) {
        $locale = $_SESSION['SESSION_LANG'];
    } else {
        $locale = $language;
    }

    putenv('LANG='.$locale);
    setlocale(LC_ALL, $locale);
    $domain = 'webshop';
    bindtextdomain($domain, 'locale');
    bind_textdomain_codeset($domain, 'UTF-8');
    textdomain($domain);
?>
