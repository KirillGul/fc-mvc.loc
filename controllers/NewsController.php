<?php
//подключение модели
include_once ROOT . '/models/News.php'; 

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

        echo '<pre>';
        print_r($newsList);
        echo '</pre>';

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
    public function actionView($category, $id)
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

            echo '<pre>';
            print_r($newsItem);
            echo '</pre>';

            // echo 'actionView';
        }
    }

    public function actionArchiveList()
    {
        
    }
}
