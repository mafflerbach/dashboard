<?php
namespace ddashboard\Page;

use Silex\ControllerProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Index implements ControllerProviderInterface
{
    public function __construct()
    {
    }

    public function connect(Application $app)
    {
        $start = $app['controllers_factory'];

        $start->get('/', function (Request $request) use ($app) {
            $this->todoStub($app);
            $this->menuStub($app);
            return $app['twig']->render('index.twig');
        });
        return $start;
    }


    private function todoStub($app) {

        $example = array(
            'id' => 1,
            'headline' => 'headline 1',
            'prio' => 'low',
            'description' => 'desc',
            'dueDate' => "10.06.2016",
            'link' => array(
                'title' => 'title',
                'href' => 'href'
            ),
            'sharedFrom' => 2

        );

        $example2 = array(
            'id' => 2,
            'headline' => 'headline 2',
            'prio' => 'low',
            'description' => 'desc',
            'dueDate' => "10.06.2016",
            'link' => array(
                'title' => 'title',
                'href' => 'href'
            ),
            'sharedTo' => array(1,2,3,4)
        );

        $app['todo'] = array(
            $example,
            $example2
        );
    }

    private function menuStub($app) {
        $menu = array(
            array(
                'id' => 1,
                'title' => 'Inbox',
                'items' => 23
            ),
            array (
                'id' => 2,
                'title' => 'Scheduled',
                'items' => 2
            ),
            array (
                'id' => 4,
                'title' => 'Done',
                'items' => 3
            )
        );

        $app['menu'] = $menu;


    }


}