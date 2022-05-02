<?php 
    $locales = ['en', 'fr_CA'];

//to accept languages from the querystring as follows: mysite.com?lang=fr_CA
if(isset($_GET['lang'])){ //if there is a language choice in the querystring
    $lang = $_GET['lang'];//use this language

} elseif(isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];

}else
    $lang=Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']); //if there is no language choice in the querystring, use the language of the user's browser

    $lang = Locale::lookup($locales, $lang, true, 'en');

    $_SESSION['lang'] = $lang;

    $rootlang = preg_split('/_/', $lang);
    $rootlang = (is_array($rootlang)?$rootlang[0]:$rootlang);
    //setlocale(LC_ALL, $rootlang.".UTF8");//which locale to use. .UTF8 is to ensure proper encoding of output
    bindtextdomain($lang, "locale"); //pointing to the locale folder for the language of choice
    textdomain($lang); //what is the file name to find translations