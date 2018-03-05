<?php

require_once(__DIR__ . '/../Cache.php');
require_once(__DIR__ . '/../../libs/phpQuery.php');
require_once(__DIR__ . '/../Entities/Advert.php');

class AdvertsController
{
    private $search_form_fields = [
        'kkv1' => '',
        'kkv2' => '',
        'price1' => '',
        'price2' => '',
        'metro[]' => []
    ];


    public function index(Request $request)
    {
        $params = $request->all();

        $fields = $this->search_form_fields;
        foreach ($fields as $key => $value) {
            if (key_exists($key, $params))
                $fields[$key] = $params[$key];
        }

        $source_data = file_get_contents("https://www.bn.ru/zap_fl.phtml?" . $request->query_string);

        $document = phpQuery::newDocument($source_data);

        $trs = $document->find('#submitForm .results tr');
        $rooms = 0;
        $district_name = '';
        $adverts = [];
        foreach ($trs as $tr) {
            $pq = pq($tr);
            if ($pq->hasClass('bg1'))
                $rooms = intval($pq->text())?:'многокомнатная';
            if (!$pq->hasClass('bg1') && !$pq->hasClass('bg2') && !$pq->hasClass('bg3')) {
                if ($pq->find('td tr td:first')->text())
                    $district_name = $pq->find('td tr td:first')->text();
            }
            if ($pq->hasClass('bg3')) {
                $tds = $pq->find('td');
                $advert = new Advert();
                $advert->setRooms($rooms);
                $advert->setDistrictName($district_name);
                foreach ($tds as $key => $td) {
                    $text = pq($td)->text();
                    switch ($key) {
                        case 1:
                            $advert->setAddress($text);
                            break;
                        case 2:
                            $advert->setFloor($text);
                            break;
                        case 3:
                            $advert->setBuildingType($text);
                            break;
                        case 4:
                            $advert->setTotalSpace($text);
                            break;
                        case 5:
                            $advert->setHousingSpace($text);
                            break;
                        case 6:
                            $advert->setKitchenSpace($text);
                            break;
                        case 7:
                            $advert->setSanitaryUnitType($text);
                            break;
                        case 8:
                            $advert->setPrice($text);
                            break;
                        case 9:
                            $advert->setAdditionalSettings($text);
                            break;
                        case 10:
                            $advert->setSubject($text);
                            break;
                        case 11:
                            $advert->setContact($text);
                            break;
                        case 12:
                            $advert->setAdditionalInfo($text);
                            break;
                    }
                }
                $adverts[] = $advert;
            }
        }
        $metro_stations = Cache::getMetroStations();
        include(__DIR__ . '/../../resources/views/adverts/search_form.phtml');
        include(__DIR__ . '/../../resources/views/adverts/table.phtml');

        //die(var_dump($document));
    }

    public function searchForm(Request $request)
    {
        $fields = $this->search_form_fields;
        $metro_stations = Cache::getMetroStations();
        include(__DIR__ . '/../../resources/views/adverts/search_form.phtml');
    }
}