<?
define('USER', "102845_blog-omeg");
define('PASSWD', "blog-omega.Tanguy029");
define('SERVER', "mysql-tanguy-guillo.alwaysdata.net");
define('BASE', "tanguy-guillo_blog-omega");
define('BASE_URL', 'https://blog.omegawebprod.com/');

define('DEBUG', 0);
error_reporting(E_ALL);
if (DEBUG == 1) {
    display_errors(0);
    log_errors(0);
} else {
    display_errors(0);

    log_errors(1);
}

// Désactivation ofmagic_quotes_gpc
ini_set('magic_quotes_gpc', 0);
