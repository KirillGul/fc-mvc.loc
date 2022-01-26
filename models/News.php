<?php

class News
{
    public static function getNewsItemById($id)
    {

    }

    public static function getNewsList()
    {
        // Запрос к БД
        // Параметры соединения:
        // работаем с локальным хостом,
        $host = 'localhost';
        // и будем соединяться с локальной БД (локальная база данных test2)
        $dbname = 'test2';
        $user = 'root';
        $password = '';

        // Создаем объект класса PDO, передав в конструктор параметры соединения
        // при помощи этого объекта ($db), мы будем общаться с БД
        $db = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);

        // После этого, создаем пустой массив для результатов
        $newsList = array();

        // описываем нужный запрос к базе данных
        // (Выбрать 10 последних новостей из таблицы "новости")
        $result = $db->query('SELECT id, title, date, short_content FROM news ORDER BY date DESC LIMIT 4');

        // В цикле обращаемся к методу fetch() объекта в переменной $result
        // при этом в цикле мы будем получать доступ к переменной $row,
        // которая символизирует строку из БД
        // (При работе с PDO - используется Объектно-Ориентированный Подход)
        // В цикле мы записываем необходимые полученные данные в массив результата
        // и далее, возвращаем этот массив: return $newsList

        $i = 0;
 
        while ($row = $result -> fetch(PDO :: FETCH_ASSOC)){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++ ;
        }

        return $newsList ;
    }
}
