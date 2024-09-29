<?php

namespace Utils;

require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/constants.php";

class Router
{
    protected $baseRoute = '';
    protected $routes = [];
    protected $parameters = [];
    protected $request;
    protected $controller;
    protected $queryParameters = "";
    protected $queryParams = [];

    public function __construct($baseRoute = '', $controller = null)
    {
        $this->baseRoute = $baseRoute;
        $this->request = str_replace($this->baseRoute, '', $_SERVER["REQUEST_URI"]);
        $this->controller = $controller;
        $this->parseQueryParams();
        // error_log("Request URI: " . $_SERVER["REQUEST_URI"]);
        // error_log("Base route: " . $this->baseRoute);
        // error_log("Processed request: " . $this->request);
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    private function parseQueryParams()
    {
        // Removing the 'url' parameter if it exists
        if (isset($_GET['url'])) {
            unset($_GET['url']);
        }

        $data = $_GET;

        // Check if there are any parameters to process
        if (!empty($data)) {
            $assignments = [];
            $temp = [];
            foreach ($data as $column => $value) {
                // Escape single quotes in the value to prevent breaking the string
                $safeValue = addslashes($value);
                $assignments[] = "$column = '$safeValue'";
                $temp[$column] = $safeValue;
            }
            // Remove duplicate assignments
            $assignments = array_unique($assignments);

            if (count($temp) == 1) {
                $this->queryParameters = array_keys($temp)[0] . "=" . array_values($temp)[0];
            } else {
                // Convert assignments to a single string
                $this->queryParameters = implode(' AND ', $assignments);
            }
        }
    }

    public function addRoute($path, $method)
    {
        $this->routes[$path] = $method;
    }

    public function dispatch()
    {
        foreach ($this->routes as $path => $method) {
            $pattern = "@^" . preg_quote($path, '@') . "(\?.*)?$@";
            if (preg_match($pattern, $this->request, $matches)) {
                if (isset($matches[1])) {
                    $this->parameters = explode('/', trim($matches[1], '/'));
                } else {
                    $this->parameters = [];
                }
                if ($this->controller) {
                    call_user_func([$this->controller, $method], $this->parameters, $this->queryParameters);
                } else {
                    call_user_func($method, $this->parameters, $this->queryParameters);
                }
                return;
            }
        }
        echo "404 not found";
    }
}
