<?php
define('USER', "blog");
define('PASSWD', "blog");
define('SERVER', "localhost");
define('BASE', "blog");
define('BASE_URL', 'http://blog-omega.local/');

// on production need to make it on 0
// on production need to make DEBUG on 0
ini_set('display_errors', '1');

// deactivationofmagic_quotes_gpc
ini_set('magic_quotes_gpc', 0);
