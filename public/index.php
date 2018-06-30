<?php

require '../vendor/autoload.php';

try {
    (new \Dotenv\Dotenv(__DIR__ . '/..'))->load();
} catch (\Dotenv\Exception\InvalidPathException $exception) {
    // Ignore it
}

$app = new \Slim\App([
    'root' => realpath(__DIR__ . '/..'),
    'settings' => [
        'displayErrorDetails' => env('DISPLAY_ERRORS', false)
    ]
]);

call_user_func(new \App\Bootstrap\ApplicationManager, $app);

$app->run();
