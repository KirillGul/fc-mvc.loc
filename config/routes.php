<?php

// маршруты
return [
    'news/([0-9]+)' => 'news/view',
    'news' => 'news/index', // actionIndex в NewsController
    'products' => 'product/list', // actionList в ProductController
];
// - где 'news' - строка запроса
// 'news/index' - имя контроллера и экшена для обработки этого запроса (путь обработчика) 
