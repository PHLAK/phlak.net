<?php

/**
 * This is where we define our application routes.
 */

$app->get('/', App\Controllers\IndexController::class)->setName('index');
