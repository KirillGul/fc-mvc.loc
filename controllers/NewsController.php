<?php

class NewsController
{
    public function actionIndex()
    {
        // Добавим вывод в наш метод и проверим на работоспособность
        echo 'NewsController actionIndex';
        return true;
    }

    public function actionView()
    {
        echo "Просмотр ещё одной новости";
        return true;
    }

    public function actionArchiveList()
    {
        
    }
}
