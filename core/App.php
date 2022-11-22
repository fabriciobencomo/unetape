<?php

namespace core;

class App
{
    public function run()
    {
        Config::initialize($this);

        $request_method = $_SERVER["REQUEST_METHOD"];
        $query_string = urldecode($_SERVER["QUERY_STRING"]);

        $query_string = (empty($query_string)) ? "/" : $query_string;

        $route = Router::matchByMethodAndQuery($request_method, $query_string);

        if (!$route) {
            Response::print("html", View::create("","html")::render("404"),404);
            return false;
        }

        if (is_callable($route->action)) {
            call_user_func_array($route->action, array($route->params));
            return true;
        }

        $object = new $route->controller;

        call_user_func_array(array($object, $route->action), array($route->params));

        DataBase::disconnect();

        return true;
    }
}
