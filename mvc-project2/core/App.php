<?php

namespace Core;
class App
{


    public function configure()
    {
        require_once __DIR__ . '/../app/routes.php';
        require_once __DIR__ . '/../app/helper.php';
        require_once __DIR__ . '/../app/config.php';
    }


    public function handleRequests()
    {

        (new RouteService())->handleRequest();

    }

}