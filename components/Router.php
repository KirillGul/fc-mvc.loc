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

                // Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Если есть совпадение, определить какой контроллер и action обрабатывают запрос
                $segments = explode('/', $internalRoute);

                //вытаскиваем контроллер
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                
                //вытаскиваем метод и остаються одни параметры
                $actionName = 'action' . ucfirst(array_shift($segments));

                // массив с параметрами
                $parameters = $segments;
                
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);

                    $controllerObject = new $controllerName;

                    //Вариант 1
                    //$result = $controllerObject->$actionName($parameters);

                    //Вариант 2
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                    die();
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
