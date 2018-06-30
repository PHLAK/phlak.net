<?php

namespace App\Services;

use Slim\Views\PhpRenderer;

class ViewService extends Service
{
    /**
     * Register the view service.
     *
     * @return void
     */
    public function register()
    {
        $this->bind('view', function ($container) {
            return new PhpRenderer("{$container->root}/views/");
        });
    }
}
