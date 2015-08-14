<?php
require_once(__DIR__ . '/vendor/autoload.php');

// set up phpdotenv
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST', 'DB_PREFIX', 'WP_HOME', 'WP_SITEURL']);
