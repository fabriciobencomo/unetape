<?php

namespace core;

use core\router\Route;

class Router
{
    static $routes = array();
    static $methods = array("GET", "POST", "PUT", "PATH", "DELETE");

    static public function get($query_preffix, $end_point)
    {
        return static::create("GET", $query_preffix, $end_point);
    }

    static public function post($query_preffix, $end_point)
    {
        return static::create("POST", $query_preffix, $end_point);
    }

    static public function put($query_preffix, $end_point)
    {
        return static::create("PUT", $query_preffix, $end_point);
    }

    static public function path($query_preffix, $end_point)
    {
        return static::create("PATH", $query_preffix, $end_point);
    }

    static public function delete($query_preffix, $end_point)
    {
        return static::create("DELETE", $query_preffix, $end_point);
    }

    static public function create($method, $query_preffix, $end_point)
    {
        if (!isset(static::$routes[$method])) {
            static::$routes[$method] = array();
        }

        if (isset(static::$routes[$method][$query_preffix])) {
            throw new \Exception("Route {$query_preffix} in {$method} method already exists", 1);
            return null;
        }

        $route = new Route($query_preffix, $end_point);

        static::add($method, $query_preffix, $route);

        return static::$routes[$method][$query_preffix];
    }

	static private function add($method, $query_preffix, $route)
	{
		static::$routes[$method][$query_preffix] = $route;

		foreach (static::$routes[$method] as $suffix => $routes) {
			$all_suffix[$suffix] = $suffix;
		}

		array_multisort($all_suffix, SORT_DESC, static::$routes[$method]);
	}

    static public function matchByMethodAndQuery($request_method, $query_string)
    {
        if (!isset(static::$routes[$request_method])) {
            return null;
        }

        foreach (static::$routes[$request_method] as $query_preffix => $route) {
            if (preg_match("#^{$query_preffix}(\/?(?<suffix>[\w\s,\._\-\/]+))?$#", $query_string, $match)) {
                $suffix = (isset($match["suffix"]) && $match["suffix"] != "/") ? explode("/", $match["suffix"]) : array();

                if (count($suffix) % 2 != 0) array_push($suffix, "");

                $keys = $values = array();

                foreach ($suffix as $key => $value) {
                    if ($key % 2 == 0) array_push($keys, $value);
                    if ($key % 2 != 0) array_push($values, $value);
                }
                
                $match = array_combine($keys, $values);

                $route->params = $match;

                return $route;
            }
        }

        return null;
    }

    static public function matchByQueryOrAlias($param = "/")
    {
        foreach (static::all() as $routes) {
            if(array_key_exists($param, $routes)){
                return $routes[$param];
            }
        }

        foreach (static::all() as $routes) {
            foreach ($routes as $route) {
                if ($route->alias == $param) {
                    return $route;
                }
            }
        }

        return null;
    }

    static public function all()
    {
        return static::$routes;
    }

    static function link($param = "/", $params = ""){
        $params = str_replace(array("=", "&"), "/", $params);
        
        $route = static::matchByQueryOrAlias($param);

        if($route){
            return $route->query($params);
        }

        return "#";
    }

    static public function redirect($param, $params = "")
    {
        $href = static::link($param, $params);

        if($href == "#") {
            throw new \Exception("Error redirect route not exist", 1);
            return false;
        }

        header("location:". $href);
        exit;
    }
}
