<?php
$currentDir = dirname(__FILE__);
/* Custom defines made by users */
require_once $currentDir . DS . 'defines.inc.php';
require_once _CJ_CONFIG_DIR . 'autoload.php';

if (_CJ_MODE_DEV_ === true) {
    require_once _CJ_CORE_DIR_ . 'ErrorHandler.php';
}
echo '<pre>';
print_r(get_required_files());
