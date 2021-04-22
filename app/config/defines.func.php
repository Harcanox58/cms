<?php
$db_data = require_once _CJ_CONFIG_DIR . 'database.php';
if (!defined('_DB_HOST_')) {
    define('_DB_HOST_', $db_data['db_host']);
}

if (!defined('_DB_USER_')) {
    define('_DB_USER_', $db_data['db_user']);
}

if (!defined('_DB_PASSWORD_')) {
    define('_DB_PASSWORD_', $db_data['db_password']);
}

if (!defined('_DB_DATABASE_')) {
    define('_DB_DATABASE_', $db_data['db_database']);
}
if (!defined('_DB_CHARSET_')) {
    define('_DB_CHARSET_', $db_data['db_charset']);
}

if (!defined('_DB_PORT_')) {
    define('_DB_PORT_', $db_data['db_port']);
}
if (!defined('_DB_PREFIX_')) {
    define('_DB_PREFIX_', $db_data['db_prefix']);
}
