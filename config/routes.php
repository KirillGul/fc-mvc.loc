<?php

// маршруты
return array
    (
        'news/([0-9]+)' => 'news/view/$1', // actionView в NewsController
        'news' => 'news/index', // actionIndex в NewsController
    );
// - где 'news' - строка запроса
// 'news/index' - имя контроллера и экшена для обработки этого запроса (путь обработчика) 
