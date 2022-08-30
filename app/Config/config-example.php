<?php

/**
 *  exemple to use for you
 */
define('USER', "your user name");
define('PASSWD', "your password");
define('SERVER', "localhost");
define('BASE', "your BD's name");
define('TWIGDEBUG', "O");
define('BASE_URL', 'https://yourDomain.com');

/** MD5
 * 
 */
define('SALT', '$1$whatyouwant$');

/**
 * // on production need to make it on 0 // beware : Changing PHP configuration dynamically through ini_set() may create hard to debug errors.
 * // ini_set('display_errors', '1');
 * in fact it's better to do this from your php.ini :
 * display_errors=0 and
 * log_errors=1
 */
