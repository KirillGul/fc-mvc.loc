<?php

class Db
{
    public static function getConnection()
    {
        // получаем параметры соединения
        // из отдельного файла db_params.php в папке config
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        // создаем объект класса PDO
        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
        $db = new PDO($dsn , $params['user'], $params['password']);

        return $db;
        // возвращаем объект класса PDO, мы его получим в классе News:
        // - $db = Db::getConnection
    }
}
