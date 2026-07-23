<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// If running on Vercel (or similar serverless) and DB credentials are missing,
// fall back to a local SQLite database so the app doesn't throw a 500 on boot.
$vercelEnv = getenv('VERCEL') ?: getenv('VERCEL_ENV') ?: getenv('VERCEL_URL');
if ($vercelEnv && !getenv('DB_PASSWORD')) {
    $sqlitePath = __DIR__ . '/../database/database.sqlite';
    if (!file_exists($sqlitePath)) {
        if (!is_dir(dirname($sqlitePath))) {
            mkdir(dirname($sqlitePath), 0755, true);
        }
        @touch($sqlitePath);
    }
    putenv('DB_CONNECTION=sqlite');
    putenv('DB_DATABASE=' . $sqlitePath);
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
