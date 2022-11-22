<?php

if (!function_exists("console")) {
    function console(...$params)
    {
        echo "<pre>";
        var_dump(...$params);
        echo "</pre>";
    }
}

if (!function_exists("__config")) {
    function __config($config = null, $params = array())
    {
        \Core\Config::create($config)::add($params);
    }
}

if (!function_exists("__extends")) {
    function __extends(string $name = "")
    {
        \Core\View::vextends($name);
    }
}

if (!function_exists("__uncached")) {
    function __uncached()
    {
        \Core\View\Template::uncached();
    }
}

if (!function_exists("__insert")) {
    function __insert(string $name = "", $params = array())
    {
        \Core\View::vinsert($name, $params);
    }
}

if (!function_exists("__open")) {
    function __open(string $name = "")
    {
        \Core\View::osection($name);
    }
}

if (!function_exists("__close")) {
    function __close()
    {
        \Core\View::csection();
    }
}

if (!function_exists("__print")) {
    function __print($name)
    {
        \Core\View::printByName($name);
    }
}

if (!function_exists("__link")) {
    function __link($param, $params = "")
    {
        return \Core\Router::link($param, $params);
    }
}

if (!function_exists("__redirect")) {
    function __redirect($param, $params = "")
    {
        \Core\Router::redirect($param, $params);
    }
}
