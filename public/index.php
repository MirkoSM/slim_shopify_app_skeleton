<?php

define('ROOT_DIR', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);

require_once ROOT_DIR . '/vendor/autoload.php';


require_once ROOT_DIR . '/app/bootstrap.php';

require_once ROOT_DIR . '/app/shopify.php';

session_start();

$app->run();

