<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class IndexController extends Controller
{
    /**
     * Handle an incoming Index request and return a response.
     *
     * @param \Slim\Http\Request  $request  Incoming request object
     * @param \Slim\Http\Response $response Outgoing response object
     * @param array               $args     the array of request arguments
     *
     * @return \Slim\Http\Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        return $this->view('index');
    }
}
