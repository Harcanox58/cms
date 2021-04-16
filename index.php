<?php
define('DS', DIRECTORY_SEPARATOR);
require_once dirname(__FILE__) . DS . 'app' . DS . 'config' . DS . 'config.inc.php';
Boot::init()->initialize();
echo '<pre>';
