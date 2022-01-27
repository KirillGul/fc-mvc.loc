<?php
//подключение модели
include_once ROOT . '/models/News.php';
require_once (ROOT.'/components/Db.php'); // Установка соединения с БД

class NewsController
{
    public function actionIndex()
    {
        // Добавим вывод в наш метод и проверим на работоспособность
        /*echo 'NewsController actionIndex';
        return true;*/
        $newsList = [];

        // обращение к статическому методу модели
        $newsList = News::getNewsList();

        include_once ROOT . '/views/news/index.php';
        /*echo '<pre>';
        print_r($newsList);
        echo '</pre>';*/

        return true;
    }

    /*Вариант 1
    public function actionView($params)
    {
        echo '<br><br>' . $params[0];
        echo '<br>' . $params[1];
        // - если в строке запроса добавить еще некоторые некоторые элементы,
        // они бы тоже появились в нашем массиве и мы могли бы их распечатать
        return true;
    }
    */

    //Вариант 2
    public function actionView($id)
    {
        /*
        echo '<br><br>' . $category;
        echo '<br>' . $id;
        // - если в строке запроса добавить еще некоторые некоторые элементы,
        // они бы тоже появились в нашем массиве и мы могли бы их распечатать
        return true;
        */
        if ($id) {
            // обращение к статическому методу модели
            $newsItem= News::getNewsItemById($id);

            include_once ROOT . '/views/news/view.php';
            /*echo '<pre>';
            print_r($newsItem);
            echo '</pre>';*/

            // echo 'actionView';
        }
    }

    public function actionArchiveList()
    {
        
    }
}
