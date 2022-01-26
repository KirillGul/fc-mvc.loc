<?php

// маршруты
return [
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', // для адреса http://test2/news/sport/1235
    'news/([0-9]+)' => 'news/view', // для адреса: http://test2/news/"цифры"    
    'news' => 'news/index', // actionIndex в NewsController
    'products' => 'product/list', // actionList в ProductController
];
// - где 'news' - строка запроса
// 'news/index' - имя контроллера и экшена для обработки этого запроса (путь обработчика) 
