<?php
define('USER', "blog");
define('PASSWD', "blog");
define('SERVER', "localhost");
define('BASE', "blog");
define('TWIGDEBUG', "O");
define('BASE_URL', 'http://blog-omega.local');

/** MD5
 * 
 */
define('SALT', '$1$thexkyissobeautifull$');

/**
 * // on production need to make it on 0 // beware : Changing PHP configuration dynamically through ini_set() may create hard to debug errors.
 * // ini_set('display_errors', '1');
 * 
 *  * in fact it's better to do this from your php.ini :
 * display_errors=0 and
 * log_errors=1
 */
