<?php
namespace ddashboard\Page;

use Silex\ControllerProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Todolist implements ControllerProviderInterface
{
    public function __construct()
    {
    }

    public function connect(Application $app)
    {
        $start = $app['controllers_factory'];

        $start->get('/add/', function (Request $request) use ($app) {
            return $app;
        });

        $start->delete('/delete/', function (Request $request) use ($app) {
            return $app;
        });

        return $start;
    }

}