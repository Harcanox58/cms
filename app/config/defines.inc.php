 <?php
    /* Debug only */
    if (!defined('_CJ_MODE_DEV_')) {
        define('_CJ_MODE_DEV_', true);
    }
    if (_CJ_MODE_DEV_ === true) {
        @ini_set('display_errors', 'on');
        @error_reporting(E_ALL | E_STRICT);
    } else {
        @ini_set('display_errors', 'off');
    }

    /* Directories */
    $currentDir = dirname(__FILE__);
    if (!defined('_CJ_ROOT_DIR_')) {
        define('_CJ_ROOT_DIR_', realpath($currentDir . DS . '..' . DS . '..') . DS);
    }
    if (!defined('_CJ_APP_DIR_')) {
        define('_CJ_APP_DIR_', realpath($currentDir . DS . '..') . DS);
    }
    if (!defined('_CJ_CORE_DIR_')) {
        define('_CJ_CORE_DIR_', _CJ_APP_DIR_ . DS . 'core' . DS);
    }
    if (!defined('_CJ_CONFIG_DIR')) {
        define('_CJ_CONFIG_DIR', realpath($currentDir) . DS);
    }
