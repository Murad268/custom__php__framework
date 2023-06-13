<?php

namespace Core;

use App\Controllers\ContactController;

class RouteService
{
    public static array $get = [];
    public static array $post = [];
    protected array $segments = [];
    const TypeGet = 'get';
    const TypePost = 'post';
    public string $path;
    public string $uri;
    public string $method;

    public function __construct()
    {
        $this->uri = strtolower($_SERVER['REQUEST_URI']);
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->parsePath($_SERVER['QUERY_STRING']);

    }

    public function parsePath(string $path): void
    {
        $path = str_replace('path=', '', strtolower($path));
        $this->segments = explode('/', $path);
        $this->path = $path;
    }

    public static function get(string $path, array|callable $action): void
    {
        self::addRoute(self::TypeGet, $path, $action);
    }

    public static function post(string $path, array|callable $action): void
    {
        self::addRoute(self::TypePost, $path, $action);
    }

    protected static function preparePathToRegex($path): string
    {
        $segments = explode('/', $path);
        $regexPath = '';
        foreach ($segments as $segment) {
            if (preg_match('/^{[a-zA-Z-_]+}$/', $segment)) {
                $regexPath .= '\/([a-zA-Z-\d]+)';
            } else {
                $regexPath .= "\/$segment";
            }
        }
        return ltrim($regexPath, '\/',);
    }

    protected static function addRoute($type, $path, array|callable $action): void
    {
        $regexPath = self::preparePathToRegex($path);
        $routeParams = [
            'action' => $action,
            'path' => $path,
            'regex' => $regexPath,
        ];
        if ($type == self::TypeGet) {
            static::$get[$path] = $routeParams;
        } else if ($type == self::TypePost) {
            static::$post[$path] = $routeParams;
        }
    }


    public function handleRequest(): void
    {
        foreach (self::${$this->method} as $routeItem) {
            if (preg_match("/^" . $routeItem['regex'] . "$/", $this->path, $params)) {
                array_shift($params);
                if (is_callable($routeItem['action'])) {
                    call_user_func_array($routeItem['action'], $params);
                    die();
                } else {
                    $class = $routeItem['action'][0];
                    $method = $routeItem['action'][1];
                    call_user_func([new $class(), $method], ...$params);
                    die();
                }
            }
        }
    }


}