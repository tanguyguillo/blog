<?
// exemple to use for you
define('USER', "your user name");
define('PASSWD', "your password");
define('SERVER', "localhost");
define('BASE', "your BD's name");
define('BASE_URL', 'https://yourDomain.com');

// on production need to make DEBUG on 0
define('DEBUG', 1);
error_reporting(E_ALL);
if (DEBUG == 1) {
    display_errors(0);
    log_errors(0);
} else {
    display_errors(0);
    log_errors(0);
}

// Désactivation ofmagic_quotes_gpc
ini_set('magic_quotes_gpc', 0);
