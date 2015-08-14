<?php
require_once(__DIR__ . '/vendor/autoload.php');

// set up phpdotenv
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST', 'DB_PREFIX', 'WP_HOME', 'WP_SITEURL']);

// database settings
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX');

// install URL
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

// custom wp-content directory
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', __DIR__ . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

// include salts
if( !file_exists(__DIR__ . '/config/salts.php')) {
  throw new Exception('You need to include salts. Please run salts.sh.');
} else {
  require_once(__DIR__ . '/config/salts.php');
}

// wordpress is here
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/wordpress/');
require_once(ABSPATH . 'wp-settings.php');
