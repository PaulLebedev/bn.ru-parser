<?php

require_once('../libs/phpQuery.php');

Class Cache
{
    const METRO_STATIONS = '../storage/cache/metro_stations.json';

    public static function getMetroStations()
    {
        if (file_exists(self::METRO_STATIONS) && $data = file_get_contents(self::METRO_STATIONS))
            return json_decode($data);
        else
            return self::setMetroStations();
    }

    private static function setMetroStations()
    {
        $source_data = file_get_contents('https://www.bn.ru/zap_fl_w2.phtml');
        $document = phpQuery::newDocument($source_data);
        $nodes = $document->find('#metro option');
        $data = [];
        foreach ($nodes as $node) {
            $pq = pq($node);
            $data[$pq->val()] = $pq->text();
        }
        file_put_contents(self::METRO_STATIONS, json_encode($data));
        return $data;
    }
}