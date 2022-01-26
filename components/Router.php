<?php

class Router
{
    // массив маршрутов 
    private $routes;

    //записываем массив маршрутов в свойтсво
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    // метод будет принимать управление от фронтконтроллера 
    public function run()
    {
        // обратимся к методу getURI()
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $segments = explode('/', $path);

                //вытаскиваем контроллер
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                
                //вытаскиваем метод
                $actionName = 'action' . ucfirst(array_shift($segments));
                
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);

                    $controllerObject = new $controllerName;
                    $result = $controllerObject->$actionName();

                    if ($result != null) {
                        break;
                    }
                }
            }
        }
    }

    //получаем адрес введенный пользователем
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
}
