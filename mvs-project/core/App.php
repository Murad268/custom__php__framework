<?php

namespace Core;
class App
{


    public function configure()
    {
        require_once __DIR__ . '/../app/routes.php';
    }


    public function handleRequests()
    {

        (new RouteService())->handleRequest();

    }

}