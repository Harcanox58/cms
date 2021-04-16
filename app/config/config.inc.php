<?php
$currentDir = dirname(__FILE__);
/* Custom defines made by users */
/* require core files */
require_once $currentDir . DS . 'defines.inc.php';
require_once _CJ_CONFIG_DIR . 'defines.func.php';
if (_CJ_MODE_DEV_ === true) {
    require_once _CJ_CORE_DIR_ . 'ErrorHandler.php';
}
require_once _CJ_CONFIG_DIR . 'autoload.php';
