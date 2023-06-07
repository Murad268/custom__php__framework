<?php
require_once __DIR__.'/autoload.php';
use Core\App;
$app=new App();
$app->configure();
$app->handleRequests();



