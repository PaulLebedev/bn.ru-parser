<?php

class Request
{
    const GET = 'GET';
    const POST = 'POST';

    public $method;
    public $query_string;
    public $action;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->query_string = $_SERVER['QUERY_STRING'];
        $this->action = explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    public function all(): array
    {
        $res = [];
        $params = explode('&', $_SERVER['QUERY_STRING']);
        foreach ($params as $param) {
            $i = explode('=', $param);
            if (!empty($i[0]) && !empty($i[1]))
                if (substr($i[0], -6) === '%5B%5D')
                    $res[rawurldecode($i[0])][] = $i[1];
                else
                    $res[$i[0]] = $i[1];
        }
        return $res;
    }
}