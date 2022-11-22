<?php

namespace core;

class Controller
{
    public function render($view, $params = array())
    {
        return View::render($view, $params);
    }

    public function print($view, $params = array())
    {
        $view = View::render($view, $params);

        Response::print("html", $view, 200, array(
            "content-type" => "text/html; charset=utf-8"
        ));
    }

    public function response($type = "", $data = null, $status = 200, $headers = array())
    {
        Response::print($type, $data, $status, $headers);
    }
}
