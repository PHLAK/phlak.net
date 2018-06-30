<?php

namespace App\Controllers;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

abstract class Controller
{
    /** @var \Slim\Container The Slim application container */
    protected $container;

    /**
     * App\Controllers\Controller constructor. Runs on object creation.
     *
     * @param \Slim\Container $container The Slim application container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Handle an incoming request and return a response.
     *
     * @param \Slim\Http\Request $request  Incoming request object
     * @param \Slim\Http\Request $response Outgoing response object
     * @param array              $args     the array of request arguments
     *
     * @return \Slim\Http\Response
     */
    abstract public function __invoke(Request $request, Response $response, array $args);

    /**
     * Render a view with some provided data.
     *
     * @param string $view The view name to be rendered
     * @param array  $data An array of data passed to the view
     *
     * @return \Slim\Http\Response
     */
    protected function view($view, $data = [])
    {
        return $this->container->view->render($this->container->get('response'), "{$view}.php", $data);
    }
}
