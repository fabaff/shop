<?php
    // This is setting the locale to use.
    $locale = $_SESSION["SESSION_LANG"];

    putenv('LANG='.$locale);
    setlocale(LC_ALL, $locale);
    $domain = 'webshop';
    bindtextdomain($domain, 'locale');
    bind_textdomain_codeset($domain, 'UTF-8');
    textdomain($domain);
?>
