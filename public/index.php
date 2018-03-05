<?php

require('../app/App.php');

$config=json_decode(file_get_contents('../config.json'));
$app = new App($config);

$app->run();
//require('../libs/phpQuery.php');

//$source_data = file_get_contents('https://www.bn.ru/zap_fl.phtml?kkv1=2&kkv2=&price1=5000&price2=&pr1m1=&pr1m2=&so1=&so2=&sg1=&sg2=&sk1=&sk2=&metro%5B%5D=54&metro%5B%5D=61&ags=&search_ags=1&sorttype=0&sortordtype=0&text=');

//$document = phpQuery::newDocument($source_data);

//$nodes = $document->find('text.text');

//require('../resources/view/metro_stations.phtml');

/*foreach ($hentry as $el) {
    $pq = pq($el); // Это аналог $ в jQuery
    $pq->find('h2.entry-title > a.blog')->attr('href', 'http://%username%.habrahabr.ru/blog/')->html('%username%'); // меняем атрибуты найденого элемента
    $pq->find('div.entry-info')->remove(); // удаляем ненужный элемент
    $tags = $pq->find('ul.tags > li > a');
    $tags->append(': ')->prepend(' :'); // добавляем двоеточия по бокам
    $pq->find('div.content')->prepend('<br />')->prepend($tags); // добавляем контент в начало найденого элемента
}*/

//echo $nodes;