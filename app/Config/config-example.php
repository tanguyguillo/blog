<?
// exemple to use for you
define('USER', "your user name");
define('PASSWD', "your password");
define('SERVER', "localhost");
define('BASE', "your BD's name");
define('BASE_URL', 'https://yourDomain.com');

// on production need to make it on 0
ini_set('display_errors', '1');

// Désactivation ofmagic_quotes_gpc
ini_set('magic_quotes_gpc', 0);
