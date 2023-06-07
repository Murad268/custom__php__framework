<?php

namespace Core;

use App\Controllers\ContactController;

class RouteService
{
    public static array $get = [];
    public static array $post = [];
    const TypeGet = 'get';
    const TypePost = 'post';
    public string $path;
    public string $method;


    public function __construct()
    {
        $this->path = $_SERVER['QUERY_STRING'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }


    public static function get(string $path, array|callable $action): void
    {
        $route = [
            'path' => $path,
            'action' => $action,
        ];
        self::addRoute(self::TypeGet, $route);
    }

    public static function post(string $path, array|callable $action): void
    {
        $route = [
            'path' => $path,
            'action' => $action,
        ];
        self::addRoute(self::TypePost, $route);
    }

    private static function addRoute(string $type, array $route): void
    {
        if ($type == self::TypeGet) {
            self::$get[$route['path']] = $route['action'];
        } elseif ($type == self::TypePost) {
            self::$post[$route['path']] = $route['action'];
        }

    }

    public function handleRequest(): void
    {

        $uriPath = explode('path=', $this->path)[1];
        foreach (self::$get as $path => $action) {
            if ($uriPath == $path) {
                if (is_callable($action)) {
                    call_user_func_array($action,[]);
                } else {
                    $controller = $action[0];
                    call_user_func([new $controller(), $action[1]]);
                }
            }

        }
    }
}