<?php

namespace Src\Core;

class Router
{
    private string $path;
    private string $method;
    public int|bool $error;
    private array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => [],
    ];

    /**
     * Constructor
     *
     * @param string $url
     */
    public function __construct(
        private string $url
    )
    {
        // Sets the current path
        $this->path = url() . $_SERVER['REQUEST_URI'];
        if (str_contains($this->path, BASE)) {
            $this->path = substr($this->path, strlen(BASE));
        }

        // Sets the current request method
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->error = false;
    }

    /**
     * Sets a 'GET' route
     *
     * @param string $path
     * @param array $controller
     * @return void
     */
    public function get(string $path, array $controller)
    {
        $this->routes['GET'][$path] = $controller;
    }

    /**
     * Sets da 'POST' route
     *
     * @param string $path
     * @param array $controller
     * @return void
     */
    public function post(string $path, array $controller)
    {
        $this->routes['POST'][$path] = $controller;
    }

    /**
     * Sets da 'PUT' route
     *
     * @param string $path
     * @param array $controller
     * @return void
     */
    public function put(string $path, array $controller)
    {
        $this->routes['PUT'][$path] = $controller;
    }

    /**
     * Sets da 'DELETE' route
     *
     * @param string $path
     * @param array $controller
     * @return void
     */
    public function delete(string $path, array $controller)
    {
        $this->routes['DELETE'][$path] = $controller;
    }

    /**
     * Runs the current route
     *
     * @return void
     */
    public function dispatch()
    {
        $controller = $this->routes[$this->method][$this->path];

        if (!$controller) {
            return $this->error = 404;
        }

        // Creates an instance of that class and call its respective method
        $con = new $controller[0]();
        $method = $controller[1];
        return $con->$method();
    }
}
