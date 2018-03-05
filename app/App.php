<?php

require('Request.php');
require('Controllers/AdvertsController.php');

Class App
{
    public $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function run()
    {
        $this->route();
    }

    private function route()
    {
        switch ($this->request->action) {
            case '/':
                if ($this->request->method === Request::GET) {
                    $controller = new AdvertsController();
                    $controller->searchForm($this->request);
                }
                break;
            case '/adverts':
                if ($this->request->method === Request::GET) {
                    $controller = new AdvertsController();
                    $controller->index($this->request);
                }
                break;
            default:
                //404 error
        }
    }
}