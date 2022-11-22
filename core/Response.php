<?php

namespace core;

class Response
{
    static private $headers = array();
    static private $response = '';
    static private $status_code = null;

    static public function print($type, $data = null, $status_code = null, array $headers = array())
    {
        foreach ($headers as $key => $value) {
            static::$headers[$key] = $value;
        }

        if($status_code){
            static::$status_code = http_response_code($status_code);
        }else{
            static::$status_code = http_response_code();
        }
        
        switch ($type) {
            case 'raw':
                static::raw($data);
                break;
            case 'json':
                static::json($data);
                break;
            case 'html':
                static::html($data);
                break;
            default:
            throw new \Exception("Invalid Response Type {$type} only valids are raw, json and html", 1);
                return false;
                break;
        }

        http_response_code(static::$status_code);

        foreach (static::$headers as $key => $value) {
            header(strtolower($key) . ": " . $value);
        }

        echo static::$response;
    }

    static private function raw(string $data)
    {
        if (!isset(static::$headers['content-type']) || empty(static::$headers['content-type'])) {
            static::$headers['content-type'] = 'text/plain; charset=utf-8';
        }

        static::$response = $data;
    }

    static private function json($data)
    {
        static::$headers['content-type'] = 'application/json; charset=utf-8';

        static::$response = json_encode($data, true);
    }

    static private function html(string $data)
    {
        static::$headers['content-type'] = 'text/html; charset=utf-8';

        static::$response = trim($data);
    }
}
