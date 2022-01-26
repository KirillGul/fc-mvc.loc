<?php

class Router
{
    // массив маршрутов 
    private $routes;

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

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Если есть совпадение, определить какой контроллер и action обрабатывают запрос
                $segments = explode('/', $internalRoute); // $internalRoute вместо $path

                // получаем имя контроллера
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                // получаем название экшена
                $actionName = 'action' . ucfirst(array_shift($segments));

                // Определяем путь к файлу, который нужно подключить (путь к файлу класса)
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                // затем проверяем: если такой файл существует, то подключаем его
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);

                    // создаем объект класса контроллера
                    $controllerObject = new $controllerName;

                    // для этого объекта мы вызываем метод
                    $result = $controllerObject->$actionName();

                    if ($result != null) {
                        break;
                    }

                    echo '<br>controller name: ' . $controllerName ;
                    echo '<br>action name: ' . $actionName ;
                    $parameters = $segments;// массив с параметрами
                    echo '<pre>';
                    print_r($parameters);
                    die ;
                }
            }
        }
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
}
